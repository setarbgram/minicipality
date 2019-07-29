<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recordtype extends Model
{
    protected $table = 'tbl_recordtype';

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
