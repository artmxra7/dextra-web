<?php

//Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'Web\DashboardController@index');

    //News-Category
    Route::get('news-category/json','Web\NewsCategoryController@json')->name('datatable_newscat');
    Route::resource('news-category', 'Web\NewsCategoryController');
    Route::get('news-category/hapus/{news_category}', 'Web\NewsCategoryController@hapus');
    Route::patch('news-category/confirm/{news_category}', 'Web\NewsCategoryController@confirm')->name('news-category.delete');

    //News
    Route::get('news', 'Web\NewsController@index');
    Route::get('news/json','Web\NewsController@json')->name('datatable_news');
    Route::resource('news', 'Web\NewsController');


    //Job Category
    Route::get('job-category', 'Web\JobCategoryController@index');
    Route::get('job-category/json','Web\JobCategoryController@json')->name('datatable_jobcat');
    Route::resource('job-category', 'Web\JobCategoryController');





    //Product
    Route::get('product', 'Web\ProductController@index');
    Route::get('product/json','Web\ProductController@json')->name('datatable_product');
    Route::resource('product', 'Web\ProductController');


    Route::get('product-brands', 'Web\ProductBrandController@index');
    Route::get('product-brands/json','Web\ProductBrandController@json')->name('datatable_product_brand');
    Route::resource('product-brands', 'Web\ProductBrandController');




    Route::get('product-unit', 'Web\ProductUnitController@index');
    Route::get('product-unit/json','Web\ProductUnitController@json')->name('datatable_product_unit');
    Route::resource('product-unit', 'Web\ProductUnitController');




    //Order Job
    Route::get('order-job', 'Web\OrderJobController@index');
    Route::get('order-job/json', 'Web\OrderJobController@json')->name('datatable_orderjob');
    Route::resource('order-job', 'Web\OrderJobController');

    //Order Product
    Route::get('order-product', 'Web\OrderProductController@index');
    Route::get('order-product/json', 'Web\OrderProductController@json')->name('datatable_orderproduct');
    Route::resource('order-job', 'Web\OrderProductController');


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
