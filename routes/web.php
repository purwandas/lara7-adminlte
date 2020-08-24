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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/available-input', 'HomeController@index')->name('available-input.index');

Route::group(['prefix' => 'role','middleware' => ['auth']], function() {
	Route::get('', 'RoleController@index')->name('role.index');
	Route::get('import-template', 'RoleController@importTemplate')->name('role.import-template');
});

Route::group(['prefix' => 'user','middleware' => ['auth']], function() {
	Route::get('', 'UserController@index')->name('user.index');
	Route::get('import-template', 'UserController@importTemplate')->name('user.import-template');
});
