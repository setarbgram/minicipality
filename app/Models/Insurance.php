<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{

    protected $table = 'tbl_insurance';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subjectNO',
        'branchNO',
        'file'
    ];

}
