<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predefinitestate extends Model
{

    protected $table = 'tbl_predefinitestate';

    protected $fillable = [
        'contractID',
        'secretariatID',
        'contractorAmount',
        'secretariatDate',
        'technicalAmount',
        'netAmount',
        'supervisorAmount',
        'finalAmount',
        'file'
    ];

}