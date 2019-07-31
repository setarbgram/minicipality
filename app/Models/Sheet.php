<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'tbl_sheet';

    protected $fillable = [
        'contractID',
        'typeNO',
        'patternAgeNO',
        'patternID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllSheet()
    {
        $Sheets = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Sheets;

    }

    public function findSheet($SheetId)
    {
        $Sheet = self::where('id', $SheetId)->first();
        return $Sheet;
    }

}
