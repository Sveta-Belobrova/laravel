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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
//Route::get('/users', 'UserController@index')->name('users.index');
//Route::get('/users/create', 'UserController@create')->name('users.create');
//Route::get('/users/{user}', 'UserController@edit')->name('users.edit');
//Route::post('/store', 'UserController@store')->name('users.store');
//Route::post('/users/{user}/update', 'UserController@update')->name('users.update');
//Route::post('/users/{user}/delete', 'UserController@delete')->name('users.delete');
