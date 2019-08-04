<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recertification extends Model
{

    protected $table = 'tbl_recertification';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllRecertifications()
    {
        $Recertifications = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Recertifications;

    }

    public function findRecertification($recertificationId)
    {
        $recertification = self::where('id', $recertificationId)->first();
        return $recertification;
    }

    public function createRecertification($request)
    {
        $recertification = self::create([
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $request['communicationDate'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/letters"), $fileName);
            $recertification->file = $fileName;

        }

        $recertification->save();
        return $recertification;

    }


}
