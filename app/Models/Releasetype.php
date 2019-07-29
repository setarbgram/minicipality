<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Releasetype extends Model
{
    protected $table = 'tbl_releasetype';

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
