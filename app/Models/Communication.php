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

}
