<?php
namespace App\Http\Controllers;
use App\Models\ShenasnamePeiman;
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
    public function contractNumber(Request $request)
    {
        $shenasePeimanObj = new ShenasnamePeiman();
        $message = $shenasePeimanObj->checkUniqueShenaseId($request);
        return response()->json($message);
    }
}
