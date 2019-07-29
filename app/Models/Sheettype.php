<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheettype extends Model
{


    protected $table = 'tbl_sheettype';

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
