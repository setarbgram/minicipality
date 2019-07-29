<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporarystate extends Model
{

    protected $table = 'tbl_temporarystate';

    protected $fillable = [
        'contractID',
        'secretariatID',
        'prepayment',
        'secretariatDate',
        'contractorAmount',
        'statementID',
        'technicalAmount',
        'prepaymentPercent',
        'netAmount',
        'supervisorAmount',
        'finalAmount',
        'file'
    ];

    public function getAllTemporarystate()
    {
        $Temporarystates = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Temporarystates;

    }

}
