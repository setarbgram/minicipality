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
        $notification = self::create([
            "contractID" => $request['contractID'],
            "subject" => $request['subject'],
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

            $file->move(public_path("/uploads/letters"), $fileName);
            $notification->file = $fileName;

        }

        $notification->save();
        return $notification;

    }


}
