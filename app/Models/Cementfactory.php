<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cementfactory extends Model
{
    protected $table = 'tbl_cementfactory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllCementfactory()
    {
        $cementfactorys = self::orderBy('created_at', 'DECS')->paginate(12);
        return $cementfactorys;

    }

    public function findCementfactory($cementfactoryId)
    {
        $cementfactory = self::where('id', $cementfactoryId)->first();
        return $cementfactory;
    }

    public function createCementfactory($request)
    {
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $cementfactory = self::create([
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
            $cementfactory->file = $fileName;

        }

        $cementfactory->save();
        return $cementfactory;

    }

    public function updateCementfactory($request)
    {
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $cementfactoryId = $request['cementfactoryId'];
        $cementfactory = self::where('id', $cementfactoryId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $cementfactory['file'];
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


            $cementfactory->file = $fileName;
        }
        else {
            $fileName = $cementfactory->file;
        }


        $cementfactory->update(array(
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,

        ));

        return $cementfactory;
    }

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $activity = self::where('id', $id)->first();
            $file = $activity['file'];
            if (strlen($file)) {
                $img_path = public_path("/uploads/letters") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($activitiesID); //users:name of checkbox
    }
}
