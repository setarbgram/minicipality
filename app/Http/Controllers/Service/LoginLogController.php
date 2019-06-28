<?php

namespace App\Http\Controllers\Service;

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


    public function create(Request $request)
    {
        $userObj = new User();
        $loginLogObj = new LoginLog();

        $user = $userObj->findByUserName($request['username']);

        if($user){
            $loginLog = $loginLogObj->creatLog($user['id']);
            return response()->json(['status'=> 'true']);
        }else{
            return response()->json(['status'=> 'false']);
            }
    }
}
