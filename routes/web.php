<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::group(['middleware'=>'auth'], function() {
    // crud data kriteria
    Route::resource('datakriteria', 'App\Http\Controllers\DataKriteriaController');
    Route::get('/deletedata/{id}', 'App\Http\Controllers\DataKriteriaController@destroy')->name('deletedata');

    // crud data rumah sakit
    Route::resource('rumahsakit', 'App\Http\Controllers\RumahSakitController');
    Route::get('/deleters/{id}', 'App\Http\Controllers\RumahSakitController@destroy')->name('deleters');

    // crud data kecamatan
    Route::get('/kecamatan', 'App\Http\Controllers\KecamatanController@index')->name('kecamatan');
    Route::get('/createkecamatan', 'App\Http\Controllers\KecamatanController@create')->name('createkecamatan');
    Route::post('/simpankecamatan', 'App\Http\Controllers\KecamatanController@store')->name('simpankecamatan');
    Route::get('/editkecamatan/{id}', 'App\Http\Controllers\KecamatanController@edit')->name('editkecamatan');
    Route::post('/updatekecamatan/{id}', 'App\Http\Controllers\KecamatanController@update')->name('updatekecamatan');
    Route::get('/deletekecamatan/{id}', 'App\Http\Controllers\KecamatanController@destroy')->name('deletekecamatan');

    // crud data tahun
    Route::resource('tahun', 'App\Http\Controllers\TahunController');
    Route::get('/deletetahun/{id}', 'App\Http\Controllers\TahunController@destroy')->name('deletetahun');

    // crud data info tbc
    Route::resource('infotbc', 'App\Http\Controllers\InfoTBCController');
    Route::get('/deleteinfo/{id}', 'App\Http\Controllers\InfoTBCController@destroy')->name('deleteinfo');

    // hasil clustering
    Route::get('/hasilcluster2016', 'App\Http\Controllers\PythonController@hasil1')->name('hasilcluster2016');
    Route::get('/hasilcluster2017', 'App\Http\Controllers\PythonController@hasil2')->name('hasilcluster2017');
    Route::get('/hasilcluster2018', 'App\Http\Controllers\PythonController@hasil3')->name('hasilcluster2018');
    Route::get('/hasilcluster2019', 'App\Http\Controllers\PythonController@hasil4')->name('hasilcluster2019');

    //pemetaan tingkat kerawanan
    Route::get('peta2017', 'App\Http\Controllers\HomeController@peta_2017')->name('peta2017');
    Route::get('peta2018', 'App\Http\Controllers\HomeController@peta_2018')->name('peta2018');
    Route::get('peta2019', 'App\Http\Controllers\HomeController@peta_2019')->name('peta2019');

});

