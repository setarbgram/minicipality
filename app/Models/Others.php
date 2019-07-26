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
}
