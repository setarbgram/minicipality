<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patternagetype extends Model
{

    protected $table = 'tbl_patternagetype';
    protected $fillable = [
        'patternAgeNO',
        'patternAge',

    ];

    public function getAllTypes()
    {
        $types = self::all();
        return $types;
    }
}
