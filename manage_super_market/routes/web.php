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

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/register', 'AdminController@create')->name('register');

/**
 * URL authen.com/admin/register
 * Route dđăng kí từ form POST
 */
Route::post('/register', 'AdminController@store')->name('register.store');


Route::get('/login', 'LoginController@login')->name('auth.login');

/**
 * URL authen.com\admin\login
 * Xử lý đăng nhập
 */
Route::post('/login', 'LoginController@loginAdmin')->name('auth.loginAdmin');

/**
 * Route dùng để đăng xuất
 */
Route::post('/logout', 'LoginController@logout')->name('auth.logout');


/**
 * Route cho quản lý danh mục
 */

// Route quản lý danh mục sản phẩm

Route::get('/category', 'CategoryController@index')->name('category');
//Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');

// Route xóa sản phẩm trong category
Route::post('/category/del', 'CategoryController@delete')->name('category.delete');

// Route lưu trữ dữ liệu danh mục khi tọa mới
Route::post('/category', 'CategoryController@store')->name('category.store');

//Route lưu trữ dữ liệu danh mục khi sửa
//Route::post('/category/{id}', 'CategoryController@update')->name('category.update');

//Route lưu trữ dữ liệu dnah mục khi xóa
Route::post('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');

//Route chi tiết các sản phẩm nằm trong danh mục nào đó
Route::get('/category/{id}/detail', 'CategoryController@detail')->name('category.detail');


//Route update sản phẩm trong category
Route::post('/category/upd', 'CategoryController@upd')->name('category.upd');

//Route load danh muc
Route::get('/category/load', 'CategoryController@load')->name('category.load');




//Route quản lý sản phẩm
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
Route::get('/product/{id}/delete', 'ProductController@delete')->name('product.delete');

// Route lưu trữ dữ liệu khi tọa mới sản phẩm
Route::post('/product', 'ProductController@store')->name('product.store');

//Route lưu trữ dữ liệu sản phẩm khi sửa
Route::post('/product/{id}', 'ProductController@update')->name('product.update');

//Route lưu trữ dữ liệu sản phẩm khi xóa
Route::post('/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');