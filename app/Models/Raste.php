<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raste extends Model
{
    protected $table = 'tbl_raste';

    protected $fillable = [
        'contractID',
        'rasteNO',
        'file'
    ];

    public function getAllRaste()
    {
        $rastes = self::orderBy('created_at', 'DECS')->paginate(12);
        return $rastes;

    }

    public function findRaste($rasteId)
    {
        $raste = self::where('id', $rasteId)->first();
        return $raste;
    }

    public function createRaste($request)
    {
        $raste = self::create([
            "contractID" => $request['contractID'],
            "rasteNO" => $request['rasteNO'],

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/raste"), $fileName);

            $raste->file = $fileName;
        }

        $raste->save();
        return $raste;
    }

     public function updateRaste($request)
    {
        $rasteId = $request['rasteId'];
        $raste = self::where('id', $rasteId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $raste['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/raste") . '/' . $file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $date = date("h_i_sa");
            $fileNameHash = $scannedFile->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $scannedFile->move(public_path("/uploads/raste"), $fileName);


            $raste->file = $fileName;
        }
        else {
            $fileName = $raste->file;
        }


        $raste->update(array(
            "contractID" => $request['contractID'],
            "rasteNO" => $request['rasteNO'],
            "file" => $fileName,
        ));

        return $raste;

    }

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $raste = self::where('id', $id)->first();
            $file = $raste['file'];
            if (strlen($file)) {
                $img_path = public_path("/uploads/raste") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($activitiesID); //users:name of checkbox
    }

}
