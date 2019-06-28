<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/', ['middleware' => 'admin', 'uses' => 'Admin\AccountController@redirect'])->name('main_panel');


Route::group(['prefix' => '/panel', 'namespace' => 'Admin'], function () {

    Route::get('/', ['middleware' => 'admin', 'uses' => 'AccountController@panelAccount'])->name('main_panel');
    Route::post('/', ['middleware' => 'admin', 'uses' => 'AccountController@updateUserAccount'])->name('edit.panel');
    Route::get('/change-password', ['middleware' => 'admin', 'uses' => 'AccountController@changePassword'])->name('change.password');
    Route::post('/change-password', ['middleware' => 'admin', 'uses' => 'AccountController@storeNewPassword']);

    /*----------------------user-----------------------*/

    Route::get('/users', ['middleware' => 'admin', 'uses' => 'UserController@index'])->name('users');
    Route::get('/add-user', ['middleware' => 'admin', 'uses' => 'UserController@create'])->name('user.add');
    Route::post('/add-user', ['middleware' => 'admin', 'uses' => 'UserController@store'])->name('user.store');
    Route::get('/edit-user/{userId}', ['middleware' => 'admin', 'uses' => 'UserController@edit'])->name('user.edit');
    Route::post('/edit-user/{userId}', ['middleware' => 'admin', 'uses' => 'UserController@update'])->name('user.edit');
    Route::delete('/users', ['middleware' => 'admin', 'uses' => 'UserController@destroy'])->name('user.remove');
    /*----------------------login logs-----------------------*/

    Route::get('/login-logs', ['middleware' => 'admin', 'uses' => 'LoginLogController@index'])->name('login-logs');
});

Route::group(['prefix' => '/web-service', 'namespace' => 'Service'], function () {
    
    /*----------------------login logs-----------------------*/

//    Route::get('/add-log', ['uses' => 'LoginLogController@create'])->name('login-logs.add'); // sample url: web-service/add-log?username=behzadi123
});


/*___________________VALIDATION___________________*/
Route::post('/validation/username', 'validationController@validateUserName');





