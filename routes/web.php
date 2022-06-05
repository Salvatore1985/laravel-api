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

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes();
//*ROTTE PER CUI SI NECESSITA L'AUTENTICAZIONE
Route::middleware('auth')
->name('admin.')
->prefix('admin')
->namespace('Admin')
->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('posts','PostController');
});

//* GESTIAMO TUTTE LE ROTTE CHE NON SONO DI AUTH (login, register ecc ) e neanche di /admin
Route::get('{any?}',function(){
    return view('guest.home');
})->where('any','.*');
