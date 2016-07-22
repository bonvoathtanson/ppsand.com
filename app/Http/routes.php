<?php
Route::group(['prefix' => '/'], function(){
    Route::get('', 'homecontroller@index');
    Route::get('login', 'usercontroller@login');
    Route::post('dologin', 'usercontroller@dologin');
    Route::get('logout', 'usercontroller@logout');
});

Route::group(['prefix' => 'view'], function(){
    Route::get('/user', 'usercontroller@index');
    Route::get('/item', 'itemcontroller@index');
    Route::get('/customer', 'customercontroller@index');
    Route::get('/supplier', 'suppliercontroller@index');
    Route::get('/income', 'incomecontroller@index');
    Route::get('/expanse', 'expansecontroller@index');
    Route::get('/sale', 'salecontroller@index');
    Route::get('/selectcustomer', 'salecontroller@filter_customer');
    Route::get('/import', 'importcontroller@index');
});

Route::group(['prefix' => 'filter'], function(){
    Route::get('/customer/{value}', 'customercontroller@filter');
});

Route::group(['prefix' => 'find'], function(){
    Route::get('/customer', 'customercontroller@search');
    Route::get('/supplier', 'suppliercontroller@search');
    Route::get('/income', 'incomecontroller@search');
    Route::get('/expanse', 'expansecontroller@search');
    Route::get('/item', 'itemcontroller@search');
    Route::get('/itemdetail/{id}', 'itemcontroller@detail');
    Route::get('/user', 'usercontroller@search');
});

Route::group(['prefix' => 'create'], function(){
    Route::get('/user', 'usercontroller@create');
    Route::get('/item', 'itemcontroller@create');
    Route::get('/customer', 'customercontroller@create');
    Route::get('/supplier', 'suppliercontroller@create');
    Route::get('/income', 'incomecontroller@create');
    Route::get('/expanse', 'expansecontroller@create');
    Route::get('/sale/{id}', 'salecontroller@create');
    Route::get('/import', 'importcontroller@create');
});

Route::group(['prefix' => 'insert'], function(){
    Route::post('/sale', 'salecontroller@store');
    Route::post('/customer', 'customercontroller@store');
    Route::post('/supplier', 'suppliercontroller@store');
    Route::post('/user', 'usercontroller@store');
    Route::post('/item', 'itemcontroller@store');
});

Route::group(['prefix' => 'edit'], function(){
    Route::get('/customer/{id}', 'customercontroller@edit');
    Route::get('/supplier/{id}', 'suppliercontroller@edit');
    Route::get('/item/{id}', 'itemcontroller@edit');
});

Route::group(['prefix' => 'update'], function(){
    Route::post('/customer', 'customercontroller@update');
    Route::post('/supplier', 'suppliercontroller@update');
    Route::post('/supplier', 'suppliercontroller@update');
    Route::post('/item', 'itemcontroller@update');
});

Route::group(['prefix' => 'delete'], function(){
    Route::get('/customer/{id}', 'customercontroller@destroy');
    Route::get('/supplier/{id}', 'suppliercontroller@destroy');
    Route::get('/item/{id}', 'itemcontroller@destroy');
    Route::get('/user/{id}', 'usercontroller@destroy');
});
