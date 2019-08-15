<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{

    protected $table = 'tbl_others';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];


    public function getAllOthers()
    {
        $Others = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Others;

    }

    public function findOthers($otherId)
    {
        $other = self::where('id', $otherId)->first();
        return $other;
    }

    public function createOthers($request)
    {
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $other = self::create([
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
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
            $other->file = $fileName;

        }

        $other->save();
        return $other;

    }




    public function updateOthers($request)
    {
        $communicationDate =($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $otherId = $request['otherId'];
        $other = self::where('id', $otherId)->first();
        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $other['file'];
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


            $other->file = $fileName;
        }
        else {
            $fileName = $other->file;
        }


        $other->update(array(
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
        ));

        return $other;

    }

    public function archive($activitiesID)
    {
        foreach ($activitiesID as $id) {
            $activity = self::where('id', $id)->first();
            $file = $activity['file'];
            if (strlen($file)) {
                $img_path = public_path("/uploads/letters") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
        }
        self::destroy($activitiesID); //users:name of checkbox
    }
}
