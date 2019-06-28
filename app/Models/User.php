<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'privilege','first_name','last_name','userImage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if(User::where('id',Auth::user()->id)->where('privilege',1)){
            return true;
        }
        else{
            return false;
        }
    }

    public function workStations()
    {
        return $this->belongsToMany('App\Models\Workstation','station_user','user_id','station_id')->withTimestamps();
    }

    public function loginLog()
    {
        return $this->hasMany('App\Models\LoginLog');
    }

    public function currentUser()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return $user;
    }

    public function updateUser($request)
    {
        $userId=$request['userId'];
        $user= User::where('id',$userId)->first();
        $user->update(array(
            'username' => $request['username'],
            'first_name' => $request['fName'],
            'last_name' => $request['lName'],
            'email' => $request['email'],

        ));
        if ($request->hasFile('userImage')){
            if ($user['userImage']) {
                $image_path = public_path("/uploads/usersImage") . '/' . $user['userImage'];

                if (file_exists($image_path)) {
                    unlink($image_path);
                }

            }
            $file = $request->file('userImage');
            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));
            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";
            $file->move(public_path("/uploads/usersImage"), $fileName);
            $user->update(array(
                'userImage' => $fileName,
            ));
        }
        return $user;

    }

    public function checkUniqueUserName($request)
    {
        $username = $request['username'];
        $user = $request['userId'];
        if ($user) {
            $duplicateUsername = User::where('username', $username)->first();
            if ($duplicateUsername) {
                $currentuser = User::where('id', $request['userId'])->
                where('username', $username)->first();
                if ($currentuser) {
                    return true;
                } else {
                    return 'این نام کاربری قبلا وارد شده است . لطفا نام کاربری دیگری وارد کنید.';
                }
            } else {
                return true;
            }
        } else {
            $duplicateUserName = User::where('username', $username)->first();
            if ($duplicateUserName) {
                return 'این نام کاربری قبلا وارد شده است . لطفا نام کاربری دیگری وارد کنید.';
            } else {
                return 'true';
            }
        }
    }

    public function getAllUsers()
    {
        $user = self::where('privilege',2)->paginate(10);
//        dd($operator);
        return $user;

    }

    public function findByUserName($username)
    {
       return self::Where('username', $username)->first();
    }

    public function findUser($userId)
    {
        $user = self::where('id', $userId)->first();

        return $user;
    }

    public function createOperator($request)
    {
        $user = User::create([
            'first_name' => $request['fName'],
            'last_name' => $request['lName'],
            'username' => $request['username'],
            'password' => $request['password'],
            'title' => $request['title'],
            'privilege' =>2 ,

        ]);

        if ($request->hasFile('userImage')) {
            $file = $request->file('userImage');

            $date = date("h_i_sa");
            $fileNameHash = $file->hashName();
            $format = strtolower(strrchr($fileNameHash, '.'));

            $info = pathinfo($fileNameHash);
            $file_name = basename($fileNameHash, '.' . $info['extension']);
            $fileName = "$file_name" . "_" . "$date" . "$format";

            $file->move(public_path("/uploads/userImage"), $fileName);


            $user->userImage = $fileName;

        }

        $user->save();
        return $user;
    }

}
