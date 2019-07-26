<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventlog extends Model
{

    protected $table = 'tbl_eventlog';

    protected $fillable = [
        'username',
        'date',
        'time',
        'eventType',
        'rowID',
    ];

}
