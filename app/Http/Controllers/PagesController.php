<?php

namespace App\Http\Controllers;

use App\Models\Week;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller {

    var $take = 10;

    public function home(ZAnimesInterface $z_animes) {
        return view('pages.home', [
            'slides' => $z_animes->slidesAnimesH(),
            'releases' => $z_animes->animesInRelease(),
            'releases_episodes' => $z_animes->episodesInRelease($this->take),
            'monthly' => $z_animes->monthly(5),
            'weekly_recommendation' => $z_animes->weeklyRecommendation($this->take),
            'episodes_views' => $z_animes->recentEpisodesViews($this->take),
            'latests' => $z_animes->latestAnimes($this->take)
        ]);
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function perfil($name) {
        $users = User::where('name', $name);
        if ($users->exists()) {
            $user = $users->first();
            return view('pages.perfil', ['user' => $user, 'me' => $user == Auth::user()]);
        }
    }

    public function animes(ZAnimesInterface $z_animes, Request $request) {
        return view('pages.animes', [
            'genres' => $z_animes->genres(),
            'animes' => $z_animes->paginateAnimes($request, 10)
        ]);
    }

    public function season(ZAnimesInterface $z_animes) {
        return view('pages.season', [
            'week' => $z_animes->animesAndEpisoesByWeek()
        ]);
    }

    public function anime(ZAnimesInterface $z_animes, $anime_slug) {
        $anime = $z_animes->getAnimeOrFail('slug_name', $anime_slug);
        return view('pages.anime', [
            'similar' => $z_animes->getSimilarAnimes($anime, $this->take),
            'anime' => $z_animes->getAnimeOrFail('slug_name', $anime_slug),
        ]);
    }

    public function episode(ZAnimesInterface $z_animes, $anime_slug, $season, $episode, $episode_slug) {
        $z_animes->flashEpisodeKey(session(), $season, $episode);
        $episode = $z_animes->getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug);
        $episodes = $z_animes->getEpisodes($episode->anime);
        return view('pages.episode', [
            'initial' => $z_animes->noobInitial($episodes, $episode->id),
            'episode' => $episode,
            'episodes' => $episodes,
            'similar' => $z_animes->getSimilarAnimes($episode->anime, 7),
        ]);
    }

    public function dmca() {
        return view('pages.dmca');
    }
}
