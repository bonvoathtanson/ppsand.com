<?php
Route::get('/', 'homecontroller@index');
// View Block
Route::get('/view/user', 'usercontroller@index');
Route::get('/view/item', 'itemcontroller@index');
Route::get('/view/customer', 'customercontroller@index');
Route::get('/view/supplier', 'suppliercontroller@index');
Route::get('/view/income', 'incomecontroller@index');
Route::get('/view/expanse', 'expansecontroller@index');
Route::get('/view/sale', 'salecontroller@index');
Route::get('/view/import', 'importcontroller@index');

// Get Search Block
Route::get('/find/customer', 'customercontroller@search');
Route::get('/find/item', 'itemcontroller@search');
Route::get('/find/user', 'usercontroller@search');

Route::get('/create/user', 'usercontroller@create');
Route::get('/create/item', 'itemcontroller@create');
Route::get('/create/customer', 'customercontroller@create');
Route::get('/create/supplier', 'suppliercontroller@create');
Route::get('/create/income', 'incomecontroller@create');
Route::get('/create/expanse', 'expansecontroller@create');
Route::get('/create/sale', 'salecontroller@create');
Route::get('/create/import', 'importcontroller@create');

Route::post('/insert/customer', 'customercontroller@store');
Route::post('/insert/user', 'usercontroller@store');
Route::post('/insert/item', 'itemcontroller@store');

Route::get('/delete/customer/{id}', 'customercontroller@destroy');
Route::get('/delete/item/{id}', 'itemcontroller@destroy');
Route::get('/delete/user/{id}', 'usercontroller@destroy');

// Route edit Block
Route::get('/edit/customer/{id}', 'customercontroller@edit');
Route::get('/edit/item/{id}', 'itemcontroller@edit');

// Route update block
Route::post('/update/item', 'itemcontroller@update');

Route::get('/login', 'usercontroller@login');
Route::post('/dologin', 'usercontroller@dologin');
Route::get('/logout', 'usercontroller@logout');
