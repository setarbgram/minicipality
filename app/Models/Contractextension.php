<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractextension extends Model
{
    protected $table = 'tbl_contractextension';

    protected $fillable = [
        'contractID',
        'extensionContractTime',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllContractextension()
    {
        $Contractextensiones = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Contractextensiones;
    }

}
