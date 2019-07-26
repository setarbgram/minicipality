<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driving extends Model
{

    protected $table = 'tbl_driving';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

}
