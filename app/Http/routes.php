<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/view/user', function () {
    return view('users/index');
});
Route::get('/view/item', function () {
    return view('users/index');
});
Route::get('/view/customer', function () {
    return view('users/index');
});
Route::get('/view/supplier', function () {
    return view('users/index');
});
Route::get('/view/income', function () {
    return view('users/index');
});
Route::get('/view/expanse', function () {
    return view('users/index');
});
Route::get('/view/sale', function () {
    return view('users/index');
});

Route::get('/create/user', function () {
    return view('users/index');
});
Route::get('/create/item', function () {
    return view('users/index');
});
