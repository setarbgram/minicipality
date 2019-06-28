<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected $redirectTo = '/';
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            //return $this->redirectTo();
            if (Auth::check()) {
                if (Auth::user()->privilege == 1) {
                    return '/panel';
                }
            }
        } else {
            return '/login';
        }

        if (Auth::check()) {
            if (Auth::user()->privilege ==1) {

                $customRedirects = '/panel';

            }
        } else {
            $customRedirects = '/login';
        }

        return property_exists($this, 'redirectTo') ? $customRedirects :/*$this->redirectTo :*/ $customRedirects;


    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }


}
