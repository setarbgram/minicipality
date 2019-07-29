<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zarayeb extends Model
{

    protected $table = 'tbl_zarayeb';
    protected $fillable = [
        'contractID',
        'balasari',
        'tajhiz',
        'recommended',
        'shabkari',
        'traffic',
        'floors',
        'height',
        'zaribk',
        'zaribt',
        'file'
    ];

    public function getAllZarayeb()
    {
        $zarayebs = self::orderBy('created_at', 'DECS')->paginate(12);
        return $zarayebs;
    }

    public function findZarayeb($zarayebId)
    {
        $zarayeb = self::where('id', $zarayebId)->first();
        return $zarayeb;
    }

}
