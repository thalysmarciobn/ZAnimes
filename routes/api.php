<?php

use Illuminate\Http\Request;

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

Route::prefix('')->name('api.')->group(function () {

    Route::any('/add/{key}', 'Controller@add')->name('add');
    Route::get('/banner', 'Controller@api_banner')->name('banner');
    Route::get('/release/latest', 'APIController@latestRelease')->name('banner');
    Route::get('/genres', 'APIController@genres')->name('genres');
});
