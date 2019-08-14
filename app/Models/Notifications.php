<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{

    protected $table = 'tbl_notifications';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];

    public function getAllNotifications()
    {
        $Notificationss = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Notificationss;

    }

    public function findNotifications($notificationsId)
    {
        $notification = self::where('id', $notificationsId)->first();
        return $notification;
    }

    public function createNotifications($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $notification = self::create([
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
            $notification->file = $fileName;

        }

        $notification->save();
        return $notification;

    }

    public function updateNotifications($request)
    {
        $communicationDate = \App\Helper\shamsiToMiladi($request['communicationDate']);

        $notificationId = $request['notificationId'];
        $notification = self::where('id', $notificationId)->first();

        $scannedFile = $request->file('file');

        if ($request->hasFile('file')) {
            $file = $notification['file'];
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


            $notification->file = $fileName;
        }
        else {
            $fileName = $notification->file;
        }


        $notification->update(array(
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
            "communicationID" => $request['communicationID'],
            "communicationDate" => $communicationDate,

        ));

        return $notification;

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
