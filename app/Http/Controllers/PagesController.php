<?php

namespace App\Http\Controllers;

use App\ZAnimesControl;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use Illuminate\Http\Request;
use App\Services\Contracts\ZAnimesInterface;

class PagesController extends Controller {

    public function home(ZAnimesInterface $z_animes) {
        return view('pages.home', [
            'releases' => $z_animes->animesInRelease(),
            'releases_episodes' => $z_animes->episodesInRelease(12),
            'monthly' => $z_animes->monthly()->take(5),
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

    public function animes(Request $request) {
        return view('pages.animes', [
            'genres' => ZAnimesControl::genres(),
            'animes' => ZAnimesControl::paginateAnimes($request, 10)
        ]);
    }

    public function anime(ZAnimesInterface $z_animes, $anime_slug) {
        $anime = $z_animes->getAnimeOrFail('slug_name', $anime_slug);
        return view('pages.anime', [
            'similar' => $z_animes->getSimilarAnimes($anime, 5),
            'anime' => $anime,
        ]);
    }

    public function episode($anime_slug, $episode, $episode_slug, $season) {

    }

    public function dmca() {
        return view('pages.dmca');
    }
}