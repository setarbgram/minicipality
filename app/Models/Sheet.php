<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'tbl_sheet';

    protected $fillable = [
        'contractID',
        'typeNO',
        'patternAgeNO',
        'patternID',
        'communicationID',
        'communicationDate',
        'file'
    ];

}
