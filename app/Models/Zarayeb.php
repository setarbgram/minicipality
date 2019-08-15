<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zarayeb extends Model
{

    protected $table = 'tbl_zarayeb';
    protected $fillable = [
        'contractID',
        'balasari',
        'tajhiz',
        'recommended',
        'shabkari',
        'traffic',
        'floors',
        'height',
        'zaribk',
        'zaribt',
        'file'
    ];

    public function getAllZarayeb()
    {
        $zarayebs = self::orderBy('created_at', 'DECS')->paginate(12);
        return $zarayebs;
    }

    public function findZarayeb($zarayebId)
    {
        $zarayeb = self::where('id', $zarayebId)->first();
        return $zarayeb;
    }


    public function createZarayeb($request)
    {
        $zarayeb = self::create([
            "contractID" => $request['contractID'],
            "balasari" => $request['balasari'],
            "tajhiz" => $request['tajhiz'],
            "recommended" => $request['recommended'],
            "shabkari" => $request['shabkari'],
            "traffic" => $request['traffic'],
            "floors" => $request['floors'],
            "height" => $request['height'],
            "zaribk" => $request['zaribk'],
            "zaribt" => $request['zaribt'],

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/zarayeb"), $fileName);

            $zarayeb->file = $fileName;
        }

        $zarayeb->save();
        return $zarayeb;
    }

    public function updateZarayeb($request)
    {
        $zarayebId = $request['zarayebId'];
        $zarayeb = self::where('id', $zarayebId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $zarayeb['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/zarayeb") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/zarayeb"), $fileName);


            $zarayeb->file = $fileName;
        }
        else {
            $fileName = $zarayeb->file;
        }


        $zarayeb->update(array(
            "contractID" => $request['contractID'],
            "balasari" => $request['balasari'],
            "tajhiz" => $request['tajhiz'],
            "recommended" => $request['recommended'],
            "shabkari" => $request['shabkari'],
            "traffic" => $request['traffic'],
            "floors" => $request['floors'],
            "height" => $request['height'],
            "zaribk" => $request['zaribk'],
            "zaribt" => $request['zaribt'],
            "file" => $fileName,
        ));

        return $zarayeb;

    }

    

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $zarayeb = self::where('id', $id)->first();
            $file = $zarayeb['file'];
            if (strlen($file)) {
                $img_path = public_path("/uploads/zarayeb") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($activitiesID); //users:name of checkbox
    }



}
