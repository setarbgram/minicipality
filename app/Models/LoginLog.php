<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $table = 'login_logs';

    protected $fillable = [
        'user_id'
    ];


    public function creatLog($userId)
    {
        $log = self::create([
            'user_id' => $userId,
        ]);
        $log->save();
        return $log;
    }

    public function getAll()
    {
        $logs = self::orderBy('created_at', 'desc')->paginate(10);
        return $logs;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
