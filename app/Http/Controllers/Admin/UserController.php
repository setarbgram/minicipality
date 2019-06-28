<?php

namespace App\Http\Controllers\Admin;

use function App\Helper\dateDay;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $userObj = new User();
        $users = $userObj->getAllUsers();
        return view("pages.users.list",compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $userObj = new User();
        try {
            $user = $userObj->createOperator($request);
            DB::commit();
            return Redirect(route('users'))->with(Session::flash('flash_message', 'کاربر جدید با موفقیت ثبت شد!'));
        }catch (\Error $e) {

            DB::rollback();
            return Redirect(route('users'))->with(Session::flash('flash_message', 'خطایی در ثبت رخ داده است!'));
        }

    }

    public function edit($operatorId)
    {
        $userObj = new User();
        $user = $userObj->findUser($operatorId);
        $user_station = array(); //stations belongs to user, get from pivot table

        return view('pages.users.show', compact('user','user_station'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $userObj = new User();
        try {
           $user = $userObj->updateUser($request);

        DB::commit();
        return Redirect(route('users'))->with(Session::flash('flash_message', 'کاربر موردنظر با موفقیت ویرایش شد!'));
        }catch (\Error $e) {

            DB::rollback();
            return Redirect(route('users'))->with(Session::flash('flash_message', 'خطایی در ثبت رخ داده است!'));
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
        if ($request['user_check']) {

            foreach ($request['user_check'] as $userId) {
                $user = User::where('id', $userId)->first();
                $image1 = $user['userImage'];

                if ($image1) {
                    $image_path1 = public_path("/uploads/userImage") . '/' . $image1;
                    if (file_exists($image_path1)) {
                        unlink($image_path1);
                    }
                }

            }

            User::destroy($request['user_check']); //users:name of checkbox
            DB::commit();
            return back()->with(Session::flash('flash_d_message', 'کاربر/کاربران مورد نظر با موفقیت حذف گردید!'));
        } else {
            DB::commit();
            return back()->with(Session::flash('flash_d_message', 'انتخاب حداقل یک کاربر الزامی است!'));
        }

        }catch (\Error $e) {

            DB::rollback();
            return Redirect(route('users'))->with(Session::flash('flash_message', 'خطایی رخ داده است!'));
        }
    }
}
