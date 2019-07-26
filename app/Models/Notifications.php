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
}
