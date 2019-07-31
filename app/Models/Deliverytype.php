<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliverytype extends Model
{
    protected $table = 'tbl_deliverytype';

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
