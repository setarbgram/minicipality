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
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $recertification = self::create([
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
            $recertification->file = $fileName;

        }

        $recertification->save();
        return $recertification;

    }

    public function updateRecertification($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $recertificationId = $request['recertificationId'];
        $recertification = self::where('id', $recertificationId)->first();
        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $recertification['file'];
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


            $recertification->file = $fileName;
        }
        else {
            $fileName = $recertification->file;
        }


        $recertification->update(array(
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
            "file" => $fileName,

        ));

        return $recertification;

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
