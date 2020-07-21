<?php

use Illuminate\Support\Facades\Route;

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


/* Dashboard */
Route::get('/admin', 'AdminController@index')->name('dashboard.index');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/* BACKEND */
/* Rutas Producto*/
Route::get('admin/productos','ProductosController@index')->name('productos.index');
Route::get('admin/productos/create','ProductosController@create')->name('productos.create');
Route::post('admin/productos','ProductosController@store')->name('productos.store');
Route::get('admin/productos/edit/{id}','ProductosController@edit')->name('productos.edit');
Route::match(['put','patch'],'admin/productos/{id}','ProductosController@update')->name('productos.update');
Route::delete('admin/productos/{id}','ProductosController@destroy')->name('productos.destroy');

/* Rutas Usuarios */
Route::get('admin/users','UsersController@index')->name('users.index');
Route::get('admin/users/create','UsersController@create')->name('users.create');
Route::post('admin/users','UsersController@store')->name('users.store');
Route::get('admin/users/edit/{id}','UsersController@edit')->name('users.edit');
Route::match(['put','patch'],'admin/users/{id}','UsersController@update')->name('users.update');
Route::delete('admin/users/{id}','UsersController@destroy')->name('users.destroy');




/* FRONTEND */
/* Index */
Route::get('/','IndexController@index')->name('frontend.index');

