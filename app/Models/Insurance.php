<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{

    protected $table = 'tbl_insurance';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subjectNO',
        'branchNO',
        'file'
    ];

    public function getAllInsurances()
    {
        $Insurances = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Insurances;

    }

    public function findInsurance($insuranceId)
    {
        $insurance = self::where('id', $insuranceId)->first();
        return $insurance;
    }

}
