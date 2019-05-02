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
Route::post('/register/addUsername', 'AdminController@addUsername')->name('register.addUsername');


Route::get('/login', 'LoginController@login')->name('auth.login');

/**
 * URL authen.com\admin\login
 * Xử lý đăng nhập
 */
Route::post('/login', 'LoginController@loginAdmin')->name('auth.loginAdmin');

/**
 * Route dùng để đăng xuất
 */
Route::get('/logout', 'LoginController@logout')->name('auth.logout');


/**
 * --------------------Route cho quản lý danh mục --------------------------------
 * -------------------------------------------------------------------------------
 * -------------------------------------------------------------------------------
 */

// Route quản lý danh mục sản phẩm

Route::get('/category', 'CategoryController@index')->name('category');

//Route chi tiết các sản phẩm nằm trong danh mục nào đó
Route::get('/category/{id}/detail', 'CategoryController@detail')->name('category.detail');

//Route update sản phẩm trong category
Route::post('/category/upd', 'CategoryController@upd')->name('category.upd');

//Route load danh muc
Route::get('/category/load', 'CategoryController@load')->name('category.load');




/**
 * --------------------Route cho quản lý sản phẩm --------------------------------
 * -------------------------------------------------------------------------------
 * -------------------------------------------------------------------------------
 */


//Route quản lý sản phẩm
Route::get('/product', 'ProductController@index')->name('product');

// Route update sản phẩm
Route::post('/product/update', 'ProductController@update')->name('product.update');


// Route xóa sản phẩm
Route::post('/product/delete', 'ProductController@delete')->name('product.delete');


//Route load trang sản phẩm
Route::get('/product/load', 'ProductController@load')->name('product.load');



////Route insert duwx lieeuj
//Route::get('/list/insert', 'ListController@listInsert')->name('list');
////Route upadte list
//Route::post('/list/update', 'ListController@update')->name('list.update');
////Route bay ve trang list
//Route::get('/list', 'ListController@index')->name('list.index');