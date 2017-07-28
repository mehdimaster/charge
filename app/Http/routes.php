<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('/','HomeController@index');
Route::post('mci/charge','MCI\MCIController@chargeTopUp');
Route::post('mtn/charge','MTN\MTNController@chargeTopUp');
Route::post('rightel/charge','RighTel\RighTelController@chargeTopUp');
Route::any('{$provider}/callback','OrderController@bankCallback');
Route::get('afterpay/{$orderId}','HomeController@afterPay');

//ADMIN
//Route::group(['middleware'=>['checkRole'] ] , function(){
    Route::get('admin/dashboard' , 'Admin\AdminController@dashboard');
    Route::get('admin/report' , 'Admin\AdminController@report');
//});
Route::get('admin/login' , 'Admin\AdminController@login');
Route::post('admin/login' , 'Admin\AdminController@login');
Route::get('logout' , 'Admin\AdminController@logout');
