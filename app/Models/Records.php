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

}
