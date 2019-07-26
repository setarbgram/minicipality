<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Definitestate extends Model
{

    protected $table = 'tbl_definitestate';

    protected $fillable = [
        'contractID',
        'contractorAmount',
        'supervisorAmount',
        'technicalAmount',
        'finalAmount',
        'secretariatDate',
        'secretariatID',
        'file'
    ];

}
