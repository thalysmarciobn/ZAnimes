<?php

namespace App\Services;

use App\Services\Contracts\ZAnimesInterface;
use App\Models\Animes;
use App\Models\AnimesSeasonsEpisodes;
use Illuminate\Support\Facades\Cache;

class ZAnimes implements ZAnimesInterface
{

    public function monthly() {
        return Cache::store('file')->remember('animes', 5, function () {
            return Animes::withCount(['monthly_views'])->get()->sortByDesc('monthly_views_count');
        });
    }

    public function animesInRelease() {
        return Animes::where('status', 0)->get();
    }

    public function episodesInRelease($take) {
        return AnimesSeasonsEpisodes::whereHas('anime', function ($query) {
            return $query->where('status', 0);
        })->orderByDesc('created_at')->get()->unique('anime_id')->take($take);
    }

    public function recentEpisodesViews($limit) {
        return AnimesSeasonsEpisodes::orderByDesc('access_at')->limit($limit)->get();
    }

    public function latestAnimes($limit) {
        return Animes::orderByDesc('created_at')->limit($limit)->get();
    }

    public function getAnimeOrFail($key, $value) {
        return Animes::where($key, $value)->firstOrFail();
    }

    public function getSimilarAnimes($anime, $limit) {
        return Animes::withCount(['monthly_views'])->whereIn('genres', explode(',', $anime->genres))->orWhere('id', '!=', $anime->id)->orderByDesc('monthly_views_count')->limit($limit)->get();
    }
}