<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporarystate extends Model
{

    protected $table = 'tbl_temporarystate';

    protected $fillable = [
        'contractID',
        'statementID',
        'contractorAmount',
        'supervisorAmount',
        'secretariatID',
        'secretariatDate',
        'finalAmount',
        'prepayment',
        'technicalAmount',
        'prepaymentPercent',
        'netAmount',


        'file'
    ];

    public function getAllTemporarystate()
    {
        $Temporarystates = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Temporarystates;

    }
    public function createTemporarystate($request)
    {
        $temporarystate = self::create([
            "contractID" => $request['contractID'],
            "secretariatID" => $request['secretariatID'],
            "prepayment" => $request['prepayment'],
            "secretariatDate" => $request['secretariatDate'],
            "contractorAmount" => $request['contractorAmount'],
            "statementID" => $request['statementID'],
            "technicalAmount" => $request['technicalAmount'],
            "prepaymentPercent" => $request['prepaymentPercent'],
            "netAmount" => $request['netAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
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
            $temporarystate->file = $fileName;

        }

        $temporarystate->save();
        return $temporarystate;

    }


}
