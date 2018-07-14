<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\ZAnimesInterface;

class PagesController extends Controller {

    public function home(ZAnimesInterface $z_animes) {
        return view('pages.home', [
            'releases' => $z_animes->animesInRelease(),
            'releases_episodes' => $z_animes->episodesInRelease(12),
            'monthly' => $z_animes->monthly(5),
            'weekly_recommendation' => $z_animes->weeklyRecommendation(12),
            'episodes_views' => $z_animes->recentEpisodesViews(12),
            'latests' => $z_animes->latestAnimes(12)
        ]);
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function animes(ZAnimesInterface $z_animes, Request $request) {
        return view('pages.animes', [
            'genres' => $z_animes->genres(),
            'animes' => $z_animes->paginateAnimes($request, 10)
        ]);
    }

    public function anime(ZAnimesInterface $z_animes, $anime_slug) {
        $anime = $z_animes->getAnimeOrFail('slug_name', $anime_slug);
        return view('pages.anime', [
            'similar' => $z_animes->getSimilarAnimes($anime, 5),
            'anime' => $anime,
        ]);
    }

    public function episode(ZAnimesInterface $z_animes, $anime_slug, $season, $episode, $episode_slug) {
        $z_animes->flashEpisodeKey(session(), $season, $episode);
        return view('pages.episode', [
            'episode' => $z_animes->getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug)
        ]);
    }

    public function dmca() {
        return view('pages.dmca');
    }
}