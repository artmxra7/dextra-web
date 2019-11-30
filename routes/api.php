<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('auth/login', 'Api\AuthController@login');

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {

    Route::post('auth/token', 'Api\AuthController@tokencek');
    Route::post('auth/checktoken', 'Api\AuthController@ViewUserTokenExpired');


    Route::get('/job_categories', 'Api\User\JobCategoryController@index');

    Route::get('/job/list', 'Api\JobController@getAllJob');
    Route::get('/job/user', 'Api\JobController@getJobUser');
    Route::post('/job/create', 'Api\JobController@create');



    // USER

    Route::post('/logout', 'Api\AuthController@logout')->name('user.logout');
    Route::post('/lastlogin', 'Api\User\UserController@ViewUserLastLogin');
    Route::get('/status', 'Api\User\UserController@viewUserStatus');
    Route::get('/exists', 'Api\User\UserController@viewUserExist');
    Route::get('/profile', 'Api\User\UserController@details');
    Route::put('/profile', 'Api\User\UserController@update');
    Route::put('/profile/email', 'Api\User\UserController@updateEmail');
    Route::put('/profile/password', 'Api\User\UserController@updatePassword');
    Route::post('/updateFCM', 'Api\User\UserController@updateFCM');


    //news
    Route::resource('news', 'Api\NewsController');

    //news
    Route::resource('product', 'Api\ProductController');
    Route::post('/sparepart/order', 'Api\User\ProductController@updateFCM');



});


Route::post('user/register/step1', 'Api\User\RegisterController@registerAsUserStepOne');
Route::post('user/register/finish', 'Api\User\RegisterController@registerAsUserFinish');
