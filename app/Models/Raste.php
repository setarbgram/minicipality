<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raste extends Model
{
    protected $table = 'tbl_raste';

    protected $fillable = [
        'contractID',
        'rasteNO',
        'file'
    ];
}
