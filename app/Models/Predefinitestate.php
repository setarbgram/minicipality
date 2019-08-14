<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predefinitestate extends Model
{

    protected $table = 'tbl_predefinitestate';

    protected $fillable = [
        'contractID',
        'secretariatID',
        'contractorAmount',
        'secretariatDate',
        'technicalAmount',
        'netAmount',
        'supervisorAmount',
        'finalAmount',
        'file'
    ];

    public function getAllPredefinitestate()
    {
        $predefinitestate = self::orderBy('created_at', 'DECS')->paginate(12);
        return $predefinitestate;

    }

    public function findPredefinitestate($predefinitestateId)
    {
        $predefinitestate = self::where('id', $predefinitestateId)->first();
        return $predefinitestate;
    }

    public function createPredefinitestate($request)
    {
        $predefinitestate = self::create([
            "contractID" => $request['contractID'],
            "secretariatID" => $request['secretariatID'],
            "contractorAmount" => $request['contractorAmount'],
            "secretariatDate" => $request['secretariatDate'],
            "netAmount" => $request['netAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
            "technicalAmount" => $request['technicalAmount'],
            "finalAmount" => $request['finalAmount'],

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/workStatus"), $fileName);
            $predefinitestate->file = $fileName;

        }

        $predefinitestate->save();
        return $predefinitestate;

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
