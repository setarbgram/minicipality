<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rastetype extends Model
{

    protected $table = 'tbl_rastetype';

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
