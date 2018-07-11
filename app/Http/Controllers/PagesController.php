<?php

namespace App\Http\Controllers;

use App\Models\Animes;
use App\Models\AnimesSeasonsEpisodes;
use App\ZAnimesControl;
use Illuminate\Http\Request;
use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {
    private $Zanimes;

    public function __construct(ZAnimesInterface $ZAnimes) {
        $this->Zanimes = $ZAnimes;
    }

    public function home() {
        return view('pages.home', [
            'releases_episodes' => $this->Zanimes->cache('releases_episodes'),
            'monthly' => $this->Zanimes->cache('animes')->sortByDesc('monthly_views_count')->take(5),
            'episodes_views' => AnimesSeasonsEpisodes::latestEpisodesAccess()->limit(12)->get(),
            'latests' => $this->Zanimes->cache('animes')->sortByDesc('created_at')->take(12)
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
            'monthly' => $this->Zanimes->cache('animes')->sortByDesc('monthly_views_count')->take(5),
            'genres' => ZAnimesControl::genres(),
            'animes' => ZAnimesControl::paginateAnimes($request, 10)
        ]);
    }

    public function anime(Request $request, $anime_slug) {
        $cache = $this->Zanimes->cache('animes')->sortByDesc('views_count');
        if ($cache->contains('slug_name', $anime_slug )) {
            $subset = $cache->where('slug_name', $anime_slug);
            print_r($subset);
            return view('pages.anime',
                [
                    'anime' => $subset->first(),
                    'rank' => $this->Zanimes->cache('animes'),
                    'monthly' => $this->Zanimes->cache('animes')
                ]
            );
        }
    }

    public function episode($anime_slug, $episode, $episode_slug, $season) {

    }

    public function dmca() {
        return view('pages.dmca');
    }
}