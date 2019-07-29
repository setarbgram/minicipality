<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractwithtype extends Model
{
    protected $table = 'tbl_contractwithtype';

    protected $fillable = [
        'typeNO',
        'type',

    ];

    public function getAllTypes()
    {
        $types = self::all();
        return $types;
    }
}
