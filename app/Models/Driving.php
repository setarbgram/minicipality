<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driving extends Model
{

    protected $table = 'tbl_driving';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];
    public function getAllDrivings()
    {
        $Drivings = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Drivings;

    }

    public function findDrivings($drivingsId)
    {
        $driving = self::where('id', $drivingsId)->first();
        return $driving;
    }
}
