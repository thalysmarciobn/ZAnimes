<?php

Route::get('/', 'PagesController@home')->name('home');
Route::group(['middleware' => ['guest']], function () {
    Route::match(['get', 'post'], '/logar', 'PagesController@login')->name('login');
    Route::match(['get', 'post'], '/cadastro', 'PagesController@register')->name('register');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/sair', 'PagesController@logout')->name('logout');
});
Route::group(['middleware' => ['auth.editor:1']], function () {
    Route::match(['get', 'post'], '/panel', 'PagesController@login')->name('panel');
});