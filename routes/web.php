<?php

Route::get('/', 'PagesController@home')->name('home');
Route::get('/animes', 'PagesController@animes')->name('animes');
Route::get('/temporada', 'PagesController@season')->name('season');
Route::get('/dmca', 'PagesController@dmca')->name('dmca');
Route::get('/equipe', 'PagesController@dmca')->name('staff');
Route::any('/watch/{key}/{id}/{slug}', 'Controller@watch')->name('watch');


Route::get('/perfil/{name}', 'PagesController@perfil')->name('profile');

Route::group(['middleware' => ['guest']], function () {
    Route::post('/logar', 'AuthController@login')->name('login');
    Route::get('/cadastro', 'PagesController@register')->name('register');
    Route::post('/cadastro', 'AuthController@register');
});
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('usuario')->name('user.')->group(function () {
        Route::post('/avatar', 'AuthController@avatar')->name('avatar');
        Route::post('/configuracoes', 'PagesController@settings')->name('settings');
        Route::post('/episode', 'Controller@setEpisode')->name('setEpisode');
        Route::get('/sair', function () {
            Auth::logout();
            Session::flush();
            return redirect('/');
        })->name('logout');
    });
});
Route::group(['middleware' => ['editor:1']], function () {
    Route::prefix('panel')->name('panel.')->group(function () {
        Route::get('/logs', 'PanelController@logs')->name('logs');
        Route::match(['get', 'post'], '/', 'PanelController@panel')->name('dashboard');
        Route::prefix('week')->name('week.')->group(function () {
            Route::get('/', 'PanelController@week')->name('default');
            Route::match(['get', 'post'], '/{week}', 'PanelController@weekEdit')->name('edit');
        });
        Route::group(['middleware' => ['editor:3']], function () {
            Route::prefix('avatar')->name('avatar.')->group(function () {
                Route::any('/', 'PanelController@avatars')->name('default');
            });
        });
        Route::prefix('animes')->name('animes.')->group(function () {
            Route::match(['get', 'post'], '/', 'PanelController@animes')->name('default');
            Route::match(['get', 'post'], '/add', 'PanelController@animesAdd')->name('add');
            Route::prefix('edit')->name('edit.')->group(function () {
                Route::match(['get', 'post'], '/{slug}', 'PanelController@editAnime')->name('default');
                Route::match(['get', 'post'], '/{slug}/season/{season}', 'PanelController@editSeason')->name('season');
                Route::match(['get', 'post'], '/{slug}/season/{season}/episode/{episode}', 'PanelController@editEpisode')->name('episode');
            });
        });
    });
});
Route::get('/{anime_slug}', 'PagesController@anime')->name('anime.default');
Route::get('/{anime_slug}/{season}/episodio-{episode}/{episode_slug}', 'PagesController@episode')->name('anime.episode');

