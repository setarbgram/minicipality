<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    //
    public function panelAccount()
    {
        $users = new User();
        $user = $users->currentUser();
        return view('dashboards.admin.adminPanel', compact('user'));
    }

    public function updateUserAccount(Request $request)
    {
        $user = new User();
        $user->updateUser($request);

        return Redirect('/panel')->with(Session::flash('flash_message', 'Your information is edited!'));


    }


    /*_______________________change password________________________________*/

    public function changePassword()
    {
        $user = new User();
        $user = $user->currentUser();
        return view('dashboards.admin.changePasswordPage', compact('user'));
    }

    public function storeNewPassword(Request $request)
    {
        $user = new User();
        $user = $user->currentUser();
        $presentPassword = $request['presentPassword'];
        if (password_verify($presentPassword, $user->password)) {
            $user->update(array(
                'password' => bcrypt($request['newPassword'])
            ));
            return Redirect('/panel')->with(Session::flash('flash_message', 'Password Is Changed Successfully!'));
        } else {
            return Redirect('/panel/change-password')->with(Session::flash('flash_d_message', 'Current Password Is not Correct.'));
        }
    }

    public function redirect()
    {
        return Redirect('/panel');
}



}
