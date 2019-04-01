<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', function () {
    return view('home');
});



Route::get('register', 'AdminController@create')->name('register');

/**
 * URL authen.com/admin/register
 * Route dđăng kí từ form POST
 */
Route::post('register', 'AdminController@store')->name('register.store');


Route::get('login', 'LoginController@login')->name('auth.login');

/**
 * URL authen.com\admin\login
 * Xử lý đăng nhập
 */
Route::post('login', 'LoginController@loginAdmin')->name('auth.loginAdmin');

/**
 * Route dùng để đăng xuất
 */
Route::post('logout', 'LoginController@logout')->name('auth.logout');