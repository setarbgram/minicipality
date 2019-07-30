<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Definitestate extends Model
{

    protected $table = 'tbl_definitestate';

    protected $fillable = [
        'contractID',
        'contractorAmount',
        'supervisorAmount',
        'technicalAmount',
        'finalAmount',
        'secretariatDate',
        'secretariatID',
        'file'
    ];

    public function getAllDefinitestate()
    {
        $definitestates = self::orderBy('created_at', 'DECS')->paginate(12);
        return $definitestates;
    }

    public function createDefinitestate($request)
    {
        $definitestate = self::create([
            "contractID" => $request['contractID'],
            "contractorAmount" => $request['contractorAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
            "technicalAmount" => $request['technicalAmount'],
            "finalAmount" => $request['finalAmount'],
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
            $definitestate->file = $fileName;

        }

        $definitestate->save();
        return $definitestate;

    }


}
