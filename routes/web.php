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
    return redirect()->route('inputPeriodeUndianIndex');
});

Route::group(['prefix' => '/'], function(){
    Route::get('input-periode-undian', 'PeriodeController@periodeIndex')->name('inputPeriodeUndianIndex');
    Route::post('store-data-periode', 'PeriodeController@storeDataPeriode')->name('storeDataPeriode');

    Route::get('undian', 'UndianController@undianIndex')->name('undianIndex');

    Route::get('riwayat-undian', 'RiwayatUndianController@riwayatUndianIndex')->name('riwayatUndianIndex');
    route::post('get-riwayat-periode', 'RiwayatUndianController@getRiwayatPeriode')->name('getRiwayatPeriode');

    route::get('riwayat-periode-detail-index/{periode_id}', 'RiwayatUndianController@riwayatPeriodeDetailIndex')->name('riwayatPeriodeDetailIndex');
    route::post('get-riwayat-periode-detail', 'RiwayatUndianController@getRiwayatPeriodeDetail')->name('getRiwayatPeriodeDetail');
    route::get('export-riwayat-periode-detail/{periode_id}/{nama_periode}', 'RiwayatUndianController@exportRiwayatDetail')->name('exportRiwayatDetail');
    route::delete('delete-riwayat-periode/{periode_id}', 'RiwayatUndianController@destroyRiwayatUndian')->name('destroyRiwayatUndian');

    Route::post('get-data-periode-undian', 'PeriodeController@getDataPeriodeUndian')->name('getDataPeriodeUndian');

    Route::get('get-data-hadiah/{periodeId}', 'HadiahController@getDataHadiah')->name('getDataHadiah');
    Route::get('get-data-kupon-undian/{periodeId}/{noKupon}', 'UndianController@getDataKuponUndian')->name('getDataKuponUndian');

    Route::post('tolak-nomor-undian', 'UndianController@tolakNomorUndian')->name('tolakNomorUndian');
    Route::post('konfirmasi-nomor-undian', 'UndianController@konfirmasiNomorUndian')->name('konfirmasiNomorUndian');
});