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
Route::get('login','SessionController@login')->name('login');
Route::get('logout','SessionController@logout')->name('logout');
Route::post('store','SessionController@store')->name('store');
Route::resource('shop_category','ShopCategoryController');
Route::get('admin/pwd_edit/{admin}','AdminController@pwd_edit')->name('admin.pwd_edit');
Route::put('admin/pwd_update/{admin}','AdminController@pwd_update')->name('admin.pwd_update');
Route::resource('admin','AdminController');

