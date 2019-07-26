<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cementfactory extends Model
{
    protected $table = 'tbl_cementfactory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];
}
