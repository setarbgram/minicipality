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
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $driving = self::create([
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
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

    public function updateDriving($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $drivingId = $request['drivingId'];
        $driving = self::where('id', $drivingId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $driving['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/letters") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/letters"), $fileName);


            $driving->file = $fileName;
        }
        else {
            $fileName = $driving->file;
        }


        $driving->update(array(
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,

        ));

        return $driving;

    }


    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $activity = self::find($id);
            $activity->delete();
        }
        return 'true';
    }

}
