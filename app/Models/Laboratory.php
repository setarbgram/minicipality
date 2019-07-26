<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{

    protected $table = 'tbl_laboratory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];

}
