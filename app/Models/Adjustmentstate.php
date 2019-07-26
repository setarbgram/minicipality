<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjustmentstate extends Model
{
    protected $table = 'tbl_adjustmentstate';

    protected $fillable = [
        'contractID',
        'statementID',
        'contractorAmount',
        'supervisorAmount',
        'technicalAmount',
        'finalAmount',
        'netAmount',
        'typeNO',
        'secretariatDate',
        'secretariatID',
        'file'
    ];
}
