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
    return view('v_peta');
});

// crud data kecamatan
Route::get('/datakecamatan', 'App\Http\Controllers\KecamatanController@index')->name('datakecamatan');
Route::get('/createkecamatan', 'App\Http\Controllers\KecamatanController@create')->name('createkecamatan');
Route::post('/simpankecamatan', 'App\Http\Controllers\KecamatanController@store')->name('simpankecamatan');
Route::get('/editkecamatan/{id}', 'App\Http\Controllers\KecamatanController@edit')->name('editkecamatan');
Route::post('/updatekecamatan/{id}', 'App\Http\Controllers\KecamatanController@update')->name('updatekecamatan');
Route::get('/deletekecamatan/{id}', 'App\Http\Controllers\KecamatanController@destroy')->name('deletekecamatan');

// crud data tahun
Route::resource('tahuns', 'App\Http\Controllers\TahunController');
Route::get('/deletetahun/{id}', 'App\Http\Controllers\TahunController@destroy')->name('deletetahun');

// crud data kriteria
Route::resource('datakriterias', 'App\Http\Controllers\DataKriteriaController');
Route::get('/deletedata/{id}', 'App\Http\Controllers\DataKriteriaController@destroy')->name('deletedata');

// crud data rumah sakit
Route::resource('rumahsakit', 'App\Http\Controllers\RumahSakitController');
Route::get('/deleters/{id}', 'App\Http\Controllers\RumahSakitController@destroy')->name('deleters');

// crud data info tbc
Route::resource('infotbc', 'App\Http\Controllers\InfoTBCController');
Route::get('/deleteinfo/{id}', 'App\Http\Controllers\InfoTBCController@destroy')->name('deleteinfo');

// hasil clustering
Route::resource('hasilcluster', 'App\Http\Controllers\PythonController');