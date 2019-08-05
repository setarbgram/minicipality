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

    /*----------------------مراحل تشکیل پرونده-----------------------*/

    /*----------------------شناسه پیمان -----------------------*/

    Route::get('/documents-filing-processes/list', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@index'])->name('contractor-list');
    Route::delete('/documents-filing-processes/list', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@destroy'])->name('contractor-remove');
    Route::get('/documents-filing-processes', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@show'])->name('contractor');
    Route::post('/documents-filing-processes', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@createShenasnamePeiman'])->name('contractor-create');
    Route::get('/documents-filing-processes/edit/{id}', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@editShenasnamePeiman'])->name('shenase.edit');
    Route::post('/documents-filing-processes/edit/{id}', ['middleware' => 'admin', 'uses' => 'DocumentProcessController@updateShenasnamePeiman'])->name('shenase.update');



    /*----------------------دستور کار-----------------------*/
    Route::get('/work-order/list', ['middleware' => 'admin', 'uses' => 'WorkOrderController@index'])->name('workOrder-list');
    Route::delete('/work-order/list', ['middleware' => 'admin', 'uses' => 'WorkOrderController@destroy'])->name('workOrder-remove');
    Route::get('/work-order', ['middleware' => 'admin', 'uses' => 'WorkOrderController@show'])->name('workOrder');
    Route::post('/work-order', ['middleware' => 'admin', 'uses' => 'WorkOrderController@createWorkOrder'])->name('workOrder-create');
    Route::get('/work-order/edit/{id}', ['middleware' => 'admin', 'uses' => 'WorkOrderController@editWorkOrder'])->name('workOrder-edit');
    Route::post('/work-order/edit/{id}', ['middleware' => 'admin', 'uses' => 'WorkOrderController@updateShenasnamePeiman'])->name('workOrder-update');


    /*----------------------صورت جلسه-----------------------*/
    Route::get('/session-letter/list', ['middleware' => 'admin', 'uses' => 'SessionLetterController@index'])->name('sessionLetter-List');
    Route::delete('/session-letter/list', ['middleware' => 'admin', 'uses' => 'SessionLetterController@destroy'])->name('sessionLetter-remove');
    Route::get('/session-letter', ['middleware' => 'admin', 'uses' => 'SessionLetterController@show'])->name('sessionLetter');
    Route::post('/session-letter', ['middleware' => 'admin', 'uses' => 'SessionLetterController@createSessionLetter'])->name('sessionLetter-create');
    Route::get('/session-letter/edit/{id}', ['middleware' => 'admin', 'uses' => 'SessionLetterController@editSessionLetter'])->name('sessionLetter-edit');
    Route::post('/session-letter/edit/{id}', ['middleware' => 'admin', 'uses' => 'SessionLetterController@updateSessionLetter'])->name('sessionLetter-update');


    /*----------------------ابلاغیه-----------------------*/
    Route::get('/communication/list', ['middleware' => 'admin', 'uses' => 'CommunicationController@index'])->name('communication-List');
    Route::delete('/communication/list', ['middleware' => 'admin', 'uses' => 'CommunicationController@destroy'])->name('communication-remove');
    Route::get('/communication', ['middleware' => 'admin', 'uses' => 'CommunicationController@show'])->name('communication');
    Route::post('/communication', ['middleware' => 'admin', 'uses' => 'CommunicationController@createcommunication'])->name('communication-create');
    Route::get('/communication/edit/{id}', ['middleware' => 'admin', 'uses' => 'CommunicationController@editcommunication'])->name('communication-edit');
    Route::post('/communication/edit/{id}', ['middleware' => 'admin', 'uses' => 'CommunicationController@updatecommunication'])->name('communication-update');

    /*----------------------مشخصات فنی-----------------------*/
    Route::get('/practical-property/list', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@index'])->name('practicalProperty-List');
    /*----------------------مشخصات فنی - رسته-----------------------*/
<<<<<<< HEAD
    Route::delete('/raste/list', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@destroy'])->name('raste-remove');
=======
//    Route::delete('/practical-property/list', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@destroy'])->name('raste-remove');
>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
    Route::get('/raste', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@showRaste'])->name('raste');
    Route::post('/raste', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@createRaste'])->name('raste-create');
    Route::get('/raste/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@editRaste'])->name('raste-edit');
    Route::post('/raste/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@updateRaste'])->name('raste-update');



    /*----------------------مشخصات فنی - ضرایب متعلقه-----------------------*/
    Route::delete('/zarayeb/list', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@destroy'])->name('zarayeb-remove');
    Route::get('/zarayeb', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@showZarayeb'])->name('zarayeb');
    Route::post('/zarayeb', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@createZarayeb'])->name('zarayeb-create');
    Route::get('/zarayeb/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@editZarayeb'])->name('zarayeb-edit');
    Route::post('/zarayeb/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@updateZarayeb'])->name('zarayeb-update');


    /*----------------------مشخصات فنی - شیت-----------------------*/
    Route::delete('/sheet/list', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@destroy'])->name('sheet-remove');
    Route::get('/sheet', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@showSheet'])->name('sheet');
    Route::post('/sheet', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@createSheet'])->name('sheet-create');
    Route::get('/sheet/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@editSheet'])->name('sheet-edit');
    Route::post('/sheet/edit/{id}', ['middleware' => 'admin', 'uses' => 'PracticalPropertyController@updateSheet'])->name('sheet-update');


<<<<<<< HEAD


=======
    /*---------------------- مکاتبات-----------------------*/
    Route::get('/letters/list', ['middleware' => 'admin', 'uses' => 'LettersController@index'])->name('letters');





    /*---------------------- صورت وضعیت-----------------------*/
    Route::get('/workStatus/list', ['middleware' => 'admin', 'uses' => 'WorkStatusController@index'])->name('workStatus');

    /*----------------------صورت وضعیت - صورت وضعیت موقت-----------------------*/
    Route::get('/temporarystate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@showTemporarystate'])->name('temporarystate');
    Route::post('/temporarystate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@createTemporarystate'])->name('temporarystate-create');

    /*----------------------صورت وضعیت - صورت وضعیت تعدیل-----------------------*/
    Route::get('/adjustmentstate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@showAdjustmentstate'])->name('adjustmentstate');
    Route::post('/adjustmentstate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@createAdjustmentstate'])->name('adjustmentstate-create');


    /*----------------------صورت وضعیت - صورت وضعیت ماقبل قطعی-----------------------*/
    Route::get('/predefinitestate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@showPredefinitestate'])->name('predefinitestate');
    Route::post('/predefinitestate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@createPredefinitestate'])->name('predefinitestate-create');


    /*----------------------صورت وضعیت - صورت وضعیت قطعی-----------------------*/
    Route::get('/definitestate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@showDefinitestate'])->name('definitestate');
    Route::post('/definitestate', ['middleware' => 'admin', 'uses' => 'WorkStatusController@createDefinitestate'])->name('definitestate-create');


    /*----------------------صورت وضعیت - تمدید قرارداد-----------------------*/
    Route::get('/contractextension', ['middleware' => 'admin', 'uses' => 'WorkStatusController@showContractextension'])->name('contractextension');
    Route::post('/contractextension', ['middleware' => 'admin', 'uses' => 'WorkStatusController@createContractextension'])->name('contractextension-create');







    /*---------------------- مشخصات تحویل-----------------------*/
    Route::get('/deliveryInfo/list', ['middleware' => 'admin', 'uses' => 'DeliveryInfoController@index'])->name('deliveryInfo');
    Route::get('/deliveryInfo/temporaryDelivery', ['middleware' => 'admin', 'uses' => 'DeliveryInfoController@temporaryDeliveryShow'])->name('temporaryDeliveryShow');
    Route::get('/deliveryInfo/definiteDelivery', ['middleware' => 'admin', 'uses' => 'DeliveryInfoController@definiteDeliveryShow'])->name('definiteDeliveryShow');
    Route::post('/deliveryInfo', ['middleware' => 'admin', 'uses' => 'DeliveryInfoController@createDelivery'])->name('deliveryInfo-create');

>>>>>>> 61db029abb854631eb250e082096bf8cae25f61f
});

Route::group(['prefix' => '/web-service', 'namespace' => 'Service'], function () {
    
    /*----------------------login logs-----------------------*/

//    Route::get('/add-log', ['uses' => 'LoginLogController@create'])->name('login-logs.add'); // sample url: web-service/add-log?username=behzadi123
});


/*___________________VALIDATION___________________*/
Route::post('/validation/username', 'validationController@validateUserName');
Route::post('/validation/contractNumber', 'validationController@contractNumber');





