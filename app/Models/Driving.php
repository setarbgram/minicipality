<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driving extends Model
{

    protected $table = 'tbl_driving';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];
    public function getAllDrivings()
    {
        $Drivings = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Drivings;

    }

    public function findDrivings($drivingsId)
    {
        $driving = self::where('id', $drivingsId)->first();
        return $driving;
    }

    public function createDrivings($request)
    {
        $driving = self::create([
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
            $driving->file = $fileName;

        }

        $driving->save();
        return $driving;

    }

}
