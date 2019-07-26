<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'tbl_fuel';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];
}
