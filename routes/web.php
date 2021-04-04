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

Route::get('/datakecamatan', 'App\Http\Controllers\KecamatanController@index')->name('datakecamatan');
Route::get('/createkecamatan', 'App\Http\Controllers\KecamatanController@create')->name('createkecamatan');
Route::post('/simpankecamatan', 'App\Http\Controllers\KecamatanController@store')->name('simpankecamatan');
// route::view('/data_kecamatan', 'layouts_kecamatan.tabel_kec');
// route::view('/datakriteria', 'layouts_datakriteria.tabel_dk');
// route::view('/data_rs', 'v_tabel_rs');

// route::view('/add_kec', 'form_kec');