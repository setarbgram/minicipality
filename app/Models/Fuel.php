<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'tbl_fuel';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllFuels()
    {
        $Fuels = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Fuels;

    }

    public function findFuels($fuelId)
    {
        $fuel = self::where('id', $fuelId)->first();
        return $fuel;
    }

    public function createFuels($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $fuel = self::create([
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
            $fuel->file = $fileName;

        }

        $fuel->save();
        return $fuel;

    }

    public function updateFuel($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $FuelId = $request['fuelId'];
        $fuel = self::where('id', $FuelId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $fuel['file'];
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


            $fuel->file = $fileName;
        }
        else {
            $fileName = $fuel->file;
        }


        $fuel->update(array(
            "contractID" => $request['contractID'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
            "file" => $fileName,

        ));

        return $fuel;

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
