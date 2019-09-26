<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'Web\DashboardController@index');

    //News-Category
    Route::get('news-category', 'Web\NewsCategoryController@index');
    Route::get('news-category/json','Web\NewsCategoryController@json')->name('datatable_newscat');

    //News
    Route::get('news', 'Web\NewsController@index');
    Route::get('news/json','Web\NewsController@json')->name('datatable_news');

    //Product
    Route::get('product', 'Web\ProductController@index');
    Route::get('product/json','Web\ProductController@json')->name('datatable_product');
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
