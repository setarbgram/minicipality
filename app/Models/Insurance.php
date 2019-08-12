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
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $branchNO=($request['subjectNO']==1)?-1:$request['branchNO'];
        $insurance = self::create([
            "contractID" => $request['contractID'],
            "subjectNO" => $request['subjectNO'],
            "branchNO" => $branchNO,
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
            $insurance->file = $fileName;

        }

        $insurance->save();
        return $insurance;

    }

    public function updateInsurance($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);
        $branchNO=($request['subjectNO']==1)?-1:$request['branchNO'];

        $insuranceId = $request['insuranceId'];
        $insurance = self::where('id', $insuranceId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $insurance['file'];
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


            $insurance->file = $fileName;
        }
        else {
            $fileName = $insurance->file;
        }


        $insurance->update(array(
            "contractID" => $request['contractID'],
            "subjectNO" => $request['subjectNO'],
            "branchNO" => $branchNO,
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
        ));

        return $insurance;

    }



}
