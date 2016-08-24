<?php

Route::group(['prefix' => '/'], function(){
    Route::get('', 'HomeController@index');
    Route::get('login', 'UserController@login');
    Route::post('dologin', 'UserController@dologin');
    Route::get('logout', 'UserController@logout');
    Route::get('notification', 'HomeController@notification');
});

Route::group(['prefix' => 'transfer'], function(){
    Route::post('/sale', 'SaleController@updatetransfer');
});

Route::group(['prefix' => 'view'], function(){
    Route::get('/user', 'UserController@index');
    Route::get('/item', 'ItemController@index');
    Route::get('/customer', 'CustomerController@index');
    Route::get('/askinfo', 'CustomerController@askinfo');
    Route::get('/supplier', 'SupplierController@index');
    Route::get('/income', 'IncomeController@index');
    Route::get('/expanse', 'ExpanseController@index');
    Route::get('/sale', 'SaleController@index');
    Route::get('/transfer', 'SaleController@transfer');
    Route::get('/timetransfer', 'SaleController@timetransfer');
    Route::get('/selectcustomer', 'SaleController@filter_customer');
    Route::get('/selsupplier', 'SupplierController@filter_supplier');
    Route::get('/import', 'ImportController@index');
});

Route::group(['prefix' => 'filter'], function(){
    Route::get('/customer/{value}', 'CustomerController@filter');
    Route::get('/supplier/{value}', 'SupplierController@filter');
});

Route::group(['prefix' => 'find'], function(){
    Route::get('/customer', 'CustomerController@search');
    Route::get('/customerask', 'CustomerController@indexinfo');
    Route::get('/sale', 'SaleController@search');
    Route::get('/import', 'ImportController@search');
    Route::get('/supplier', 'SupplierController@search');
    Route::get('/income', 'IncomeController@search');
    Route::get('/expanse', 'ExpanseController@search');
    Route::get('/item', 'ItemController@search');
    Route::get('/itemdetail/{id}', 'ItemController@detail');
    Route::get('/user', 'UserController@search');
});

Route::group(['prefix' => 'create'], function(){
    Route::get('/user', 'UserController@create');
    Route::get('/item', 'ItemController@create');
    Route::get('/customer', 'CustomerController@create');
    Route::get('/askinfo/{id}', 'CustomerController@addinfo');
    Route::get('/supplier', 'SupplierController@create');
    Route::get('/income/{id}', 'IncomeController@create');
    Route::get('/otherincome', 'IncomeController@otherincome');
    Route::get('/expanse/{id}', 'ExpanseController@create');
    Route::get('/sale/{id}', 'SaleController@create');
    Route::get('/import/{id}', 'ImportController@create');
});

Route::group(['prefix' => 'insert'], function(){
    Route::post('/sale', 'SaleController@store');
    Route::post('/income', 'IncomeController@store');
    Route::post('/expanse', 'ExpanseController@store');
    Route::post('/customer', 'CustomerController@store');
    Route::post('/customerask', 'CustomerController@insertinfo');
    Route::post('/supplier', 'SupplierController@store');
    Route::post('/import', 'ImportController@store');
    Route::post('/user', 'UserController@store');
    Route::post('/item', 'ItemController@store');
    Route::post('/car', 'HomeController@car');
});

Route::group(['prefix' => 'edit'], function(){
    Route::get('/customer/{id}', 'CustomerController@edit');
    Route::get('/supplier/{id}', 'SupplierController@edit');
    Route::get('/income/{id}', 'IncomeController@edit');
    Route::get('/item/{id}', 'ItemController@edit');
});

Route::group(['prefix' => 'update'], function(){
    Route::post('/customer', 'CustomerController@update');
    Route::post('/supplier', 'SupplierController@update');
    Route::post('/income', 'IncomeController@update');
    Route::post('/item', 'ItemController@update');
    Route::post('/stock', 'ItemController@stock');
});

Route::group(['prefix' => 'delete'], function(){
    Route::get('/sale/{id}', 'SaleController@destroy');
    Route::get('/income/{id}', 'IncomeController@destroy');
    Route::get('/expanse/{id}', 'ExpanseController@destroy');
    Route::get('/customer/{id}', 'CustomerController@destroy');
    Route::get('/supplier/{id}', 'SupplierController@destroy');
    Route::get('/item/{id}', 'ItemController@destroy');
    Route::get('/user/{id}', 'UserController@destroy');
    Route::get('/import/{id}', 'ImportController@destroy');
});

Route::group(['prefix' => 'detail'], function(){
    Route::get('/customer/{id}', 'CustomerController@detail');
    Route::get('/supplier/{id}', 'SupplierController@detail');
});

Route::group(['prefix' => 'report'], function(){
    Route::get('/item', 'ItemController@report');
});
