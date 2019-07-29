<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{

    protected $table = 'tbl_laboratory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];
    
    public function getAllLaboratories()
    {
        $Laboratories = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Laboratories;

    }

    public function findLaboratorys($laboratoryId)
    {
        $laboratory = self::where('id', $laboratoryId)->first();
        return $laboratory;
    }

}
