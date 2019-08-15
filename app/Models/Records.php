<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $table = 'tbl_records';

    protected $fillable = [
        'contractID',
        'recordID',
        'communicationID',
        'communicationDate',
        'file',
        'typeNO',
    ];

    public function getAllSessions()
    {
        $sessions = self::orderBy('created_at', 'DECS')->paginate(12);
        return $sessions;

    }

    public function findSession($sessionId)
    {
        $session = self::where('id', $sessionId)->first();
        return $session;
    }

    public function createSessionLetter($request)
    {

        $communicationDate = ($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $session = self::create([
            "contractID" => $request['contractID'],
            "recordID" => $request['recordID'],
            "typeNO" => $request['typeNO'],
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

            $file->move(public_path("/uploads/sessionLetters"), $fileName);

            $session->file = $fileName;

        }

        $session->save();
        return $session;

    }

    public function updateSessionLetter($request)
    {
        $communicationDate = ($request['communicationDate'])?\App\Helper\shamsiToMiladi($request['communicationDate']):null;

        $sessionId = $request['sessionId'];
        $session = self::where('id', $sessionId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {

            $file = $session['file'];
            if (strlen($file)) {
                $path = public_path("/uploads/sessionLetters") . '/' . $file;
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

            $scannedFile->move(public_path("/uploads/sessionLetters"), $fileName);


            $session->file = $fileName;
        }
        else {
            $fileName = $session->file;
        }



        $session->update(array(
            "contractID" => $request['contractID'],
            "recordID" => $request['recordID'],
            "typeNO" => $request['typeNO'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,
            "file" => $fileName,

        ));

        return $session;

    }

    public function removeSession($request)
    {
        foreach ($request['sessionLetter_check'] as $sessionId) {
            $session = self::where('id', $sessionId)->first();
            $file = $session['file'];

            if (strlen($file)) {
                $img_path = public_path("/uploads/sessionLetters") . '/' . $file;
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }


        }
        Records::destroy($request['sessionLetter_check']); //users:name of checkbox
    }

}
