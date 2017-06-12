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

Auth::routes();
Route::resource('user', 'UserController');
Route::resource('messages', 'MessageController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sendMessage', function () {
    return view('pages.sendMessage');
})->name('sendMessage');

Route::get('/getImport', 'ExcelController@getImport')->name('getImport');
Route::post('/postImport', 'ExcelController@postImport')->name('postImport');
Route::get('/deleteAll', 'ExcelController@deleteAll')->name('deleteAll');
Route::get('/getExport', 'ExcelController@getExport')->name('getExport');
