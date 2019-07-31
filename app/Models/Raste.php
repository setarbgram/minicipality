<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raste extends Model
{
    protected $table = 'tbl_raste';

    protected $fillable = [
        'contractID',
        'rasteNO',
        'file'
    ];

    public function getAllRaste()
    {
        $rastes = self::orderBy('created_at', 'DECS')->paginate(12);
        return $rastes;

    }

    public function findRaste($rasteId)
    {
        $raste = self::where('id', $rasteId)->first();
        return $raste;
    }
}
