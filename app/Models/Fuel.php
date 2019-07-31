<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'tbl_fuel';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllFuels()
    {
        $Fuels = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Fuels;

    }

    public function findFuels($fuelId)
    {
        $fuel = self::where('id', $fuelId)->first();
        return $fuel;
    }
}
