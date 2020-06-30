<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

// Admin
Route::group(['namespace'=>'Admin'],function (){
    Route::group(['prefix'=>'admin','middleware' => ['checkuser']],function () {
        Route::get('/home', 'HomeController@index')->name('home.index');
        Route::group(['prefix'=>'brand'],function () {
            Route::get('/', 'BrandController@index')->middleware('checkacl:view_brand')->name('brand.index');

            Route::get('/create', 'BrandController@create')->middleware('checkacl:create_brand')->name('brand.create');
            Route::post('/','BrandController@store')->middleware('checkacl:create_brand')->name('brand.store');
            Route::put('/{id}','BrandController@update')->middleware('checkacl:edit_brand')->name('brand.update');
            Route::get('/{id}/edit', 'BrandController@edit')->middleware('checkacl:edit_brand')->name('brand.edit');
            Route::get('/{id}', 'BrandController@show')->middleware('checkacl:detail_brand')->name('brand.show');
        });
        /// userclient
          Route::group(['prefix'=>'userclient'],function () {
            Route::get('/', 'UserClientController@index')->name('userclient.index');
            Route::get('/create', 'UserClientController@create')->name('userclient.create');
            Route::post('/','UserClientController@store')->name('userclient.store');
            Route::put('/{id}','UserClientController@update')->name('userclient.update');
            Route::get('/{id}/edit', 'UserClientController@edit')->name('userclient.edit');
            Route::get('/{id}', 'UserClientController@show')->name('userclient.show');
        });
        
     
        Route::delete('brand_delete', 'BrandController@destroy')->name('brand_delete');

        Route::resource('about','Aboutcontroller');
    	Route::delete('about_delete', 'AboutController@destroy')->name('about_delete');
        Route::resource('category','CategoryController');
        Route::delete('category_delete', 'CategoryController@destroy')->name('category_delete');
        Route::resource('tag','TagController');
        Route::delete('tag_delete', 'TagController@destroy')->name('tag_delete');
        Route::resource('user','UserController');
        Route::delete('user_delete', 'UserController@destroy')->name('user_delete');
        Route::resource('role','RoleController');
        Route::delete('role_delete', 'RoleController@destroy')->name('role_delete');
        Route::resource('product','ProductController');
        Route::delete('product_delete', 'ProductController@destroy')->name('product_delete');
        
        Route::resource('product_detail','ProductDetailController');
        Route::delete('productdetail_delete', 'ProductDetailController@destroy')->name('productdetail_delete');
    });
});

//Client
Route::group(['namespace'=>'Client'],function (){
    Route::group(['prefix'=>'home'],function (){
        Route::get('/', 'HomeController@index')->name('home.client');
        Route::get('/product/{id}', 'HomeController@show')->name('productclient.show');
    });
    Route::resource('loginClient','LoginController');
    Route::resource('registerClient','RegisterController');
    Route::resource('cart','CartController');
    Route::get('add-to-cart', 'CartController@addToCart');
    Route::delete('remove-from-cart', 'CartController@remove');
    Route::patch('update-cart', 'CartController@update');
    Route::get('/getsize', 'HomeController@getSize');
});
Route::get('/category/{id}','Client\HomeController@Category');
    Route::get('/brand/{id}','Client\HomeController@Brand');
Route::post('/loginclient', 'Auth\LoginController@loginclient')->name('loginclient'); 
Route::post('/clientLogout', 'Auth\LoginController@clientLogout')->name('clientLogout');