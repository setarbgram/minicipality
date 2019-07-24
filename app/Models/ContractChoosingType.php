<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractChoosingType extends Model
{
    protected $table = "tbl_contractorchoosingtype";
    protected $fillable=['typeNO','type'];

    public function getAll()
    {
        $type = self::all();
        return $type;
    }
}
