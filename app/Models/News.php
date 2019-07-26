<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table = 'tbl_news';

    protected $fillable = [
        'title',
        'text',
        'date',
        'image',
        'file',

    ];

}
