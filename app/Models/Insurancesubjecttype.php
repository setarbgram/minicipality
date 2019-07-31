<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurancesubjecttype extends Model
{

    protected $table = 'tbl_insurancesubjecttype';

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
