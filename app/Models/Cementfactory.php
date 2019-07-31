<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cementfactory extends Model
{
    protected $table = 'tbl_cementfactory';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'file'
    ];

    public function getAllCementfactory()
    {
        $cementfactorys = self::orderBy('created_at', 'DECS')->paginate(12);
        return $cementfactorys;

    }

    public function findCementfactory($cementfactoryId)
    {
        $cementfactory = self::where('id', $cementfactoryId)->first();
        return $cementfactory;
    }
}
