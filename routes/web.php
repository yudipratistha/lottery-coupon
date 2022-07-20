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
    Route::get('input-periode-undian', 'UndianController@undianIndex')->name('inputPeriodeUndianIndex');
    Route::post('store-data-undian', 'UndianController@storeDataUndian')->name('storeDataUndian');
});