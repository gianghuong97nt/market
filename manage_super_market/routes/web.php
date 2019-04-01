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
    return view('welcome');
});


Route::get('/','AdminController@index')->name('admin.dashboard');

/**
 * //URL authem.com/admin/dashboard
 * Route ddang nhap thanh cong
 */

Route::get('/dashboard','AdminController@index')->name('admin.dashboard');





Route::get('register', 'AdminController@create')->name('admin.register');

/**
 * URL authen.com/admin/register
 * Route dđăng kí từ form POST
 */
Route::post('register', 'AdminController@store')->name('admin.register.store');


Route::get('login', 'LoginController@login')->name('admin.auth.login');

/**
 * URL authen.com\admin\login
 * Xử lý đăng nhập
 */
Route::post('login', 'LoginController@loginAdmin')->name('admin.auth.loginAdmin');

/**
 * Route dùng để đăng xuất
 */
Route::post('logout', 'LoginController@logout')->name('admin.auth.logout');
