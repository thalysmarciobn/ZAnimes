<?php

namespace App\Services;

use App\Models\AnimesSeasons;
use Carbon\Carbon;
use DB;
use App\Services\Contracts\ZAnimesInterface;
use App\Models\Genres;
use App\Models\Animes;
use App\Models\AnimesSeasonsEpisodes;
use Illuminate\Support\Facades\Cache;

class ZAnimes implements ZAnimesInterface
{
    public $minutes = 1;

    public function cache($cache) {
        return Cache::store('file')->get('zanimes')[$cache];
    }

    public function __construct()
    {
        if (!Cache::store('file')->has('zanimes')) {
            Cache::store('file')->put('zanimes',
                [
                    'releases_episodes' => AnimesSeasonsEpisodes::whereHas('anime',
                        function ($query)
                        {
                            return $query->where('status', 0);
                        }
                    )->orderBy('created_at', 'desc')->get()->unique('anime_id')->take(12),

                    'animes' => Animes::withCount(['monthly_views'])->get(),
                    'seasons' => AnimesSeasons::get(),
                    'episodes' => AnimesSeasonsEpisodes::withCount(['views'])->get(),
                    'latest_access' => AnimesSeasonsEpisodes::latestEpisodesAccess()->limit(12)->get()

                ]
            , $this->minutes);
        }
    }
}