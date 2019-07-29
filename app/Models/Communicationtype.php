<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communicationtype extends Model
{

    protected $table = 'tbl_communicationtype';

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
