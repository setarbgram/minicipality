<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{

    protected $table = 'tbl_laboratory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];
    
    public function getAllLaboratories()
    {
        $Laboratories = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Laboratories;

    }

    public function findLaboratory($laboratoryId)
    {
        $laboratory = self::where('id', $laboratoryId)->first();
        return $laboratory;
    }

    public function createLaboratory($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $laboratory = self::create([
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
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
            $laboratory->file = $fileName;

        }

        $laboratory->save();
        return $laboratory;

    }
    public function updateLaboratory($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $laboratoryId = $request['laboratoryId'];
        $laboratory = self::where('id', $laboratoryId)->first();
        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $laboratory['file'];
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


            $laboratory->file = $fileName;
        }
        else {
            $fileName = $laboratory->file;
        }


        $laboratory->update(array(
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
        ));

        return $laboratory;

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
