<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usertypes extends Model
{

    protected $table = 'tbl_usertypes';

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
