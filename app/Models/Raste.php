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
<<<<<<< HEAD
=======


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
    public function removeRaste($request)
    {
        foreach ($request['raste_check'] as $rasteId) {
            $raste = self::where('id', $rasteId)->first();
            $file = $raste['file'];

            if (strlen($file)) {
                $img_path = public_path("/uploads/raste") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        raste::destroy($request['raste_check']); //users:name of checkbox
    }
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
}
