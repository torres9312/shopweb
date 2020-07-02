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
Route::view('/admin', 'admin.dashboard.index');
Route::get('/', function () {
    return view('welcome');
});

/* BACKEND */
/* Rutas Producto*/
Route::get('admin/productos','ProductosController@index')->name('productos.index');


/* Dashboard */
Route::get('admin/dashboard','DashboardController@index')->name('dashboard.index');