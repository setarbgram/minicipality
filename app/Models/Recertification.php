<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recertification extends Model
{

    protected $table = 'tbl_recertification';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

}
