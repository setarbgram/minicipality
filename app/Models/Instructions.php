<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $table = 'tbl_instructions';

    protected $fillable = [
        'contractID',
        'instructionID',
        'communicationID',
        'communicationDate',
        'file'
    ];
}
