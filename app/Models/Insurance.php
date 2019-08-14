<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{

    protected $table = 'tbl_insurance';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subjectNO',
        'branchNO',
        'file'
    ];

    public function getAllInsurances()
    {
        $Insurances = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Insurances;

    }

    public function findInsurance($insuranceId)
    {
        $insurance = self::where('id', $insuranceId)->first();
        return $insurance;
    }

    public function createInsurance($request)
    {
        $branchNO=($request['subjectNO']==1)?-1:$request['branchNO'];
        $insurance = self::create([
            "contractID" => $request['contractID'],
            "subjectNO" => $request['subjectNO'],
            "branchNO" => $branchNO,
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
            $insurance->file = $fileName;

        }

        $insurance->save();
        return $insurance;

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
