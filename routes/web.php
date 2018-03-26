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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/{any}', function () {
//    return view('testapp');
//})->where('any', '.*');

Route::get('/', function () {
    return view('testapp');
})->where('any', '.*');

Route::get('/Top', function () {
    return view('testapp');
})->where('any', '.*');

Route::get('/Room', function () {
    return view('testapp');
})->where('any', '.*');

Route::get('/adadadAdmin', function () {
    return view('testapp');
})->where('any', '.*');

Route::get('/admin', function () {
    return view('testapp');
})->where('any', '.*');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('jsonpost',  'PostsController');//元アドレスにjson/{id}でapi確認ができる
Route::resource('jsonroom',  'RoomsController');
