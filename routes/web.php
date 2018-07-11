<?php

Route::get('/', 'PagesController@home')->name('home');
Route::get('/animes', 'PagesController@animes')->name('animes');
Route::get('/dmca', 'PagesController@dmca')->name('dmca');
Route::prefix('api')->group(function () {
    Route::get('/animes', 'APIController@animes');
});
Route::prefix('anime')->group(function () {
    Route::get('/{anime_slug}', 'PagesController@anime')->name('anime');
    Route::get('/{anime_slug}/episodio-{episode}-{episode_slug}-{season}', 'HomeController@episode')->name('episode');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/logar', 'PagesController@login')->name('login');
    Route::post('/logar', 'AuthController@login');
    Route::get('/cadastro', 'PagesController@register')->name('register');
    Route::post('/cadastro', 'AuthController@register');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/sair', function () {
        Auth::logout();
        Session::flush();
        return redirect('/');
    })->name('logout');
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
                Route::match(['get', 'post'], '/{slug}/season/{season}/episode/{episode}', 'PanelController@editEpisode')->name('panel-anime-edit-season-episode');
            });
        });
    });
});