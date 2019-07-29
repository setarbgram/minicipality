<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recertification extends Model
{

    protected $table = 'tbl_recertification';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllRecertifications()
    {
        $Recertifications = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Recertifications;

    }

    public function findRecertification($recertificationId)
    {
        $recertification = self::where('id', $recertificationId)->first();
        return $recertification;
    }

}
