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
Route::get('/tables', function () {
    return view('table');
});
Route::get('/charts', function () {
    return view('msg');
});
Route::get('/blank', function () {
    return view('blank');
});
Route::get('/buttons', function () {
    return view('msg');
});
Route::get('/cards', function () {
    return view('msg');
});
Route::get('/utilities-color', function () {
    return view('msg');
});
Route::get('/utilities-border', function () {
    return view('msg');
});
Route::get('/utilities-animation', function () {
    return view('msg');
});
Route::get('/utilities-other', function () {
    return view('msg');
});
Route::get('/404', function () {
    return view('404');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/consulta', 'ceController@index')->name('consulta');

Route::post('/consulta_guarda', 'ceController@store')->name('guarda_consulta');

Route::get('/emergencia', 'EmergenciaController@index')->name('emergencia');

Route::post('/emergencia_guarda', 'EmergenciaController@store')->name('guarda_emergencia');

Route::get('/hospi', 'HospiController@index')->name('hospi');

Route::post('/hospi_guarda', 'HospiController@store')->name('guarda_hospi');
