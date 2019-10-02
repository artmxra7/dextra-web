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

    Route::post('/logout', 'Api\AuthController@logout')->name('user.logout');

    Route::get('/job_categories', 'Api\User\JobCategoryController@index');

    Route::post('/job/create', 'Api\JobController@create');



    // USER
    Route::post('/lastlogin', 'Api\User\UserController@ViewUserLastLogin');
    Route::get('/status', 'Api\User\UserController@viewUserStatus');
    Route::get('/exists', 'Api\User\UserController@viewUserExist');
    Route::get('/profile', 'Api\User\UserController@details');
    Route::put('/profile', 'Api\User\UserController@update');


    Route::resource('news', 'Api\NewsController');

});


Route::post('user/register/step1', 'Api\User\RegisterController@registerAsUserStepOne');
Route::post('user/register/finish', 'Api\User\RegisterController@registerAsUserFinish');
