<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjustmenttype extends Model
{

    protected $table = 'tbl_adjustmenttype';

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
