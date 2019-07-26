<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zarayeb extends Model
{

    protected $table = 'tbl_zarayeb';
    protected $fillable = [
        'contractID',
        'balasari',
        'tajhiz',
        'recommended',
        'shabkari',
        'traffic',
        'floors',
        'height',
        'zaribk',
        'zaribt',
        'file'
    ];

}
