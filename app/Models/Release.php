<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{

    protected $table = 'tbl_release';

    protected $fillable = [
        'contractID',
        'releaseType',
        'communicationID',
        'communicationDate',
        'file',
    ];

}
