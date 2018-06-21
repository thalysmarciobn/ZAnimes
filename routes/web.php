<?php

Route::get('/', 'PagesController@home')->name('home');
Route::group(['middleware' => ['guest']], function () {
    Route::match(['get', 'post'], '/logar', 'PagesController@login')->name('login');
    Route::match(['get', 'post'], '/cadastro', 'PagesController@register')->name('register');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/sair', 'PagesController@logout')->name('logout');
});
Route::group(['middleware' => ['editor:1']], function () {
    Route::prefix('panel')->group(function () {
        Route::match(['get', 'post'], '/', 'PanelController@panel')->name('panel');
        Route::prefix('animes')->group(function () {
            Route::match(['get', 'post'], '/', 'PanelController@animes')->name('panel-animes');
            Route::match(['get', 'post'], '/add', 'PanelController@animesAdd')->name('panel-animes-add');
            Route::prefix('edit')->group(function () {
                Route::match(['get', 'post'], '/{slug}', 'PanelController@editAnime')->name('panel-anime-edit');
                Route::match(['get', 'post'], '/{slug}/season/{season}', 'PanelController@editSeason')->name('panel-anime-edit-season');
            });
        });
    });
});