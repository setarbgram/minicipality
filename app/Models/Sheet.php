<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'tbl_sheet';

    protected $fillable = [
        'contractID',
        'typeNO',
        'patternAgeNO',
        'patternID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllSheet()
    {
        $Sheets = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Sheets;

    }

    public function findSheet($SheetId)
    {
        $Sheet = self::where('id', $SheetId)->first();
        return $Sheet;
    }


    public function createSheet($request)
    {
        $sheet = self::create([
            "contractID" => $request['contractID'],
            "typeNO" => $request['typeNO'],
            "patternAgeNO" => $request['patternAgeNO'],
            "patternID" => $request['patternID'],
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

            $file->move(public_path("/uploads/sheet"), $fileName);

            $sheet->file = $fileName;
        }

        $sheet->save();
        return $sheet;
    }

    public function removeSheet($request)
    {
        foreach ($request['sheet_check'] as $sheetId) {
            $sheet = self::where('id', $sheetId)->first();
            $file = $sheet['file'];

            if (strlen($file)) {
                $img_path = public_path("/uploads/sheet") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        sheet::destroy($request['sheet_check']); //users:name of checkbox
    }

}
