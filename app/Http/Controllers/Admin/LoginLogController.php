<?php

namespace App\Http\Controllers\Admin;

use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginLogController extends Controller
{
    public function index()
    {
        $loginLogObj = new LoginLog();
        $loginLogs = $loginLogObj -> getAll();
        return view('pages.loginlog.list',compact('loginLogs'));
    }

}
