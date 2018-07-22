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
    Route::get('/banner', 'Controller@api_banner')->name('banner');
    Route::get('/test', 'Controller@api_banner')->name('banner');
    Route::get('/animes', 'Controller@api_animes')->name('api_animes');
    Route::get('/genres', 'Controller@api_genres')->name('api_genres');
});
