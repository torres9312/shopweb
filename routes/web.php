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
Route::view('/admin', 'admin.dashboard.index')->name('admin.index');
Route::get('/', function () {
    return view('welcome');
});

/* BACKEND */
/* Rutas Producto*/
Route::get('admin/productos','ProductosController@index')->name('productos.index');
Route::get('admin/productos/create','ProductosController@create')->name('productos.create');
Route::post('admin/productos','ProductosController@store')->name('productos.store');
Route::get('admin/productos/edit/{id}','ProductosController@edit')->name('productos.edit');
Route::match(['put','patch'],'admin/productos/{id}','ProductosController@update')->name('productos.update');
Route::delete('admin/productos/{id}','ProductosController@destroy')->name('productos.destroy');



/* Dashboard */
Route::get('admin/dashboard','DashboardController@index')->name('dashboard.index');

