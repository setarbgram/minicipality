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

    public function findDefinitestate($DefinitestateId)
    {
        $definitestate = self::where('id', $DefinitestateId)->first();
        return $definitestate;
    }

    public function createDefinitestate($request)
    {

        $secretariatDate = \App\Helper\shamsiToMiladi($request['secretariatDate']);

        $definitestate = self::create([
            "contractID" => $request['contractID'],
            "contractorAmount" => $request['contractorAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
            "technicalAmount" => $request['technicalAmount'],
            "finalAmount" => $request['finalAmount'],
            "secretariatDate" => $secretariatDate,
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

    public function updateDefinitestate($request)
    {

        $secretariatDate = \App\Helper\shamsiToMiladi($request['secretariatDate']);

        $definitestateId = $request['definitestateId'];
        $definitestate = self::where('id', $definitestateId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $definitestate['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/workStatus") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/workStatus"), $fileName);


            $definitestate->file = $fileName;
        }
        else {
            $fileName = $definitestate->file;
        }


        $definitestate->update(array(
            "contractID" => $request['contractID'],
            "contractorAmount" => $request['contractorAmount'],
            "supervisorAmount" => $request['supervisorAmount'],
            "technicalAmount" => $request['technicalAmount'],
            "finalAmount" => $request['finalAmount'],
            "secretariatDate" => $secretariatDate,
            "secretariatID" => $request['secretariatID'],
            "file" => $fileName,

        ));

        return $definitestate;



    }



}
