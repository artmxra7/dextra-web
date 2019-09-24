<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'Web\DashboardController@index');

//z
    Route::resource('roles', 'Web\RoleController');


    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


    Route::resource('user_dashboard', 'Web\UserDashboardController');
});
