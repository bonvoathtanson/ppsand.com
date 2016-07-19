<?php
Route::get('/', function () {
    return view('dashboard');
});
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
Route::get('/find/item', 'itemcontroller@search');

Route::get('/create/user', 'usercontroller@create');
Route::get('/create/item', 'itemcontroller@create');
Route::get('/create/customer', 'customercontroller@create');
Route::get('/create/supplier', 'suppliercontroller@create');
Route::get('/create/income', 'incomecontroller@create');
Route::get('/create/expanse', 'expansecontroller@create');
Route::get('/create/sale', 'salecontroller@create');
Route::get('/create/import', 'importcontroller@create');

Route::post('/insert/item', 'itemcontroller@store');

Route::get('/delete/item/{id}', 'itemcontroller@destroy');

// Route edit Block
Route::get('/edit/item/{id}', 'itemcontroller@edit');

// Route update block
Route::post('/update/item', 'itemcontroller@update');

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
