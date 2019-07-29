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
}
