<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class validationController extends Controller
{

    public function validateUserName(Request $request)
    {
        $user=new User();
        $message=$user->checkUniqueUserName($request);
        return response()->json($message);
    }


}
