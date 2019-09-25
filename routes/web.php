<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'Web\DashboardController@index');

    //News-Category
    Route::resource('news-category', 'Web\NewsCategoryController');

    //News
    Route::resource('news', 'Web\NewsController');

    //Product
    Route::resource('product', 'Web\ProductController');
    Route::resource('product-brands', 'Web\ProductBrandController');
    Route::resource('product-unit', 'Web\ProductUnitController');

    //Order
    Route::resource('order-product', 'Web\OrderProductController');
    Route::resource('order-job', 'Web\OrderJobController');
    Route::resource('order-rental', 'Web\OrderProductController');



    Route::resource('roles', 'Web\RoleController');


    //Order
    Route::resource('commision-sales', 'Web\CommisionSalesController');
    Route::resource('commision-mechanic', 'Web\CommisionMechanicController');

    Route::resource('coupon', 'Web\CouponController');




    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


    Route::resource('user_dashboard', 'Web\UserDashboardController');
});
