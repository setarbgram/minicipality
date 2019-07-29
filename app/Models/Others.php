<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{

    protected $table = 'tbl_others';

    protected $fillable = [
        'contractID',
        'communicationID',
        'communicationDate',
        'subject',
        'file'
    ];


    public function getAllOthers()
    {
        $Others = self::orderBy('created_at', 'DECS')->paginate(12);
        return $Others;

    }

    public function findOthers($otherId)
    {
        $other = self::where('id', $otherId)->first();
        return $other;
    }
}
