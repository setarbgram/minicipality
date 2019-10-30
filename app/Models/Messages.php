<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'tbl_messages';

    protected $fillable = [
        'sender',
        'receiver',
        'subject',
        'text',
        'hasRead',
        'date',
        'time',
        'inboxVisibility',
        'sentboxVisibility',
    ];

}
