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
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $contractextension = self::create([
            "contractID" => $request['contractID'],
            "extensionContractTime" => $request['extensionContractTime'],
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
            $file->move(public_path("/uploads/workStatus"), $fileName);
            $contractextension->file = $fileName;
        }
        $contractextension->save();
        return $contractextension;
    }

    public function updateContractextension($request)
    {

        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $contractextensionId = $request['contractextensionId'];
        $contractextension = self::where('id', $contractextensionId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $contractextension['file'];
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


            $contractextension->file = $fileName;
        }
        else {
            $fileName = $contractextension->file;
        }


        $contractextension->update(array(
            "contractID" => $request['contractID'],
            "extensionContractTime" => $request['extensionContractTime'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,

        ));

        return $contractextension;

    }

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $activity = self::where('id', $id)->first();
            $file = $activity['file'];
            if (strlen($file)) {
                $img_path = public_path("/uploads/workStatus") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($activitiesID); //users:name of checkbox
    }
}
