<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjustmentstate extends Model
{
    protected $table = 'tbl_adjustmentstate';

    protected $fillable = [
        'contractID',
        'statementID',
        'contractorAmount',
        'supervisorAmount',
        'technicalAmount',
        'finalAmount',
        'netAmount',
        'typeNO',
        'secretariatDate',
        'secretariatID',
        'file'
    ];

    public function getAllAdjustmentstate()
    {
        $adjustmentstates = self::orderBy('created_at', 'DECS')->paginate(12);
        return $adjustmentstates;

    }

    public function createAdjustmentstate($request)
    {
        $adjustmentstate = self::create([
            "contractID" => $request['contractID'],
            "statementID" => $request['statementID'],
            "contractorAmount" => $request['contractorAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
            "technicalAmount" => $request['technicalAmount'],
            "finalAmount" => $request['finalAmount'],
            "netAmount" => $request['netAmount'],
            "typeNO" => $request['typeNO'],
            "secretariatDate" => $request['secretariatDate'],
            "secretariatID" => $request['secretariatID'],

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
            $adjustmentstate->file = $fileName;

        }

        $adjustmentstate->save();
        return $adjustmentstate;

    }

}
