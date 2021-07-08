<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cluster2016', 'App\Http\Controllers\PythonController@result1')->name('cluster2016');
Route::get('/cluster2017', 'App\Http\Controllers\PythonController@result2')->name('cluster2017');
Route::get('/cluster2018', 'App\Http\Controllers\PythonController@result3')->name('cluster2018');
Route::get('/cluster2019', 'App\Http\Controllers\PythonController@result4')->name('cluster2019');

Route::get('/cluster', 'App\Http\Controllers\PythonController@dataAll')->name('cluster');

Route::get('/datars', 'App\Http\Controllers\RumahSakitController@dataRS')->name('datars');
Route::get('/infotbc', 'App\Http\Controllers\InfoTBCController@dataInfo')->name('infotbc');

Route::get('/data2016', 'App\Http\Controllers\DataKriteriaController@dataInfo1')->name('data2016');
Route::get('/data2017', 'App\Http\Controllers\DataKriteriaController@dataInfo2')->name('data2017');
Route::get('/data2018', 'App\Http\Controllers\DataKriteriaController@dataInfo3')->name('data2018');
Route::get('/data2019', 'App\Http\Controllers\DataKriteriaController@dataInfo4')->name('data2019');