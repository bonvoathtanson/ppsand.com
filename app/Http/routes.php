<?php
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/view/user', 'usercontroller@index');
Route::get('/view/item', 'itemcontroller@index');
Route::get('/view/customer', 'customercontroller@index');
Route::get('/view/supplier', 'suppliercontroller@index');
Route::get('/view/income', 'incomecontroller@index');
Route::get('/view/expanse', 'expansecontroller@index');
Route::get('/view/sale', 'salecontroller@index');
Route::get('/view/import', 'importcontroller@index');

Route::get('/create/user', 'usercontroller@create');
Route::get('/create/item', 'itemcontroller@create');
