<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractextension extends Model
{
    protected $table = 'tbl_contractextension';

    protected $fillable = [
        'contractID',
        'extensionContractTime',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllContractextension()
    {
        $Contractextensiones = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Contractextensiones;
    }

    public function findContractextension($contractextensionId)
    {
        $contractextension = self::where('id', $contractextensionId)->first();
        return $contractextension;
    }

    public function createContractextension($request)
    {
        $contractextension = self::create([
            "contractID" => $request['contractID'],
            "extensionContractTime" => $request['extensionContractTime'],
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

            $file->move(public_path("/uploads/workStatus"), $fileName);
            $contractextension->file = $fileName;

        }

        $contractextension->save();
        return $contractextension;

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
