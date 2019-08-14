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
        $cementfactory = self::create([
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
            $cementfactory->file = $fileName;

        }

        $cementfactory->save();
        return $cementfactory;

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
