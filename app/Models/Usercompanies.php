<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usercompanies extends Model
{

    protected $table = 'tbl_usercompanies';

    protected $fillable = [
        'username',
        'companyname',
    ];
}