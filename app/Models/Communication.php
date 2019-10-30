<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{

    protected $table = 'tbl_communication';

    protected $fillable = [
        'contractID',
        'communicationType',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllcommunications()
    {
        $communications = self::orderBy('created_at', 'DECS')->paginate(12);
        return $communications;

    }

    public function findCommunication($communicationId)
    {
        $communication = self::where('id', $communicationId)->first();
        return $communication;
    }

    public function createCommunication($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $communication = self::create([
            "contractID" => $request['contractID'],
            "communicationType" => $request['communicationType'],
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

            $file->move(public_path("/uploads/communication"), $fileName);

            $communication->file = $fileName;

        }

        $communication->save();
        return $communication;

    }

    public function updateCommunication($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $communicationId = $request['communicationId'];
        $communication = self::where('id', $communicationId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $communication['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/communication") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/communication"), $fileName);


            $communication->file = $fileName;
        }
        else {
            $fileName = $communication->file;
        }


        $communication->update(array(
            "contractID" => $request['contractID'],
            "communicationType" => $request['communicationType'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
            "file" => $fileName,

        ));

        return $communication;

    }

    public function removeCommunication($request)
    {
        foreach ($request['communication_check'] as $communicationId) {
            $communication = self::where('id', $communicationId)->first();
            $file = $communication['file'];

            if (strlen($file)) {
                $img_path = public_path("/uploads/communication") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        Communication::destroy($request['communication_check']); //users:name of checkbox
    }

}
