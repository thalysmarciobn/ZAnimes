<?php

namespace App\Services;

use App\Models\Slides;
use App\Services\CustomPaginate;
use App\Models\Week;
use DB;
use App\Models\AnimesSeasons;
use App\Models\AnimesSeasonsEpisodesViews;
use App\Models\Genres;
use App\Models\UsersEpisodes;
use App\Services\Contracts\ZAnimesInterface;
use App\Models\Animes;
use App\Models\AnimesSeasonsEpisodes;
use App\ZAnimesControl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ZAnimes implements ZAnimesInterface {

    public function slidesAnimesH() {
        return Slides::with(['anime' => function ($query) {
            return $query->withCount(['weekly_views'])->orderByDesc('weekly_views_count');
        }])->get()->sortByDesc('anime.weekly_views_count');
    }

    public function animes() {
        return Animes::all();
    }

    public function genres() {
        return Genres::all();
    }

    public function monthly($count) {
        return Cache::store('file')->remember('monthly', Carbon::now()->endOfMonth()->diffInMinutes(), function () use ($count) {
            return Animes::withCount(['monthly_views'])->get()->sortByDesc('monthly_views_count')->take($count);
        });
    }

    public function weeklyRecommendation($count) {
        return Cache::store('file')->remember('weeklyRecommendation', Carbon::now()->endOfWeek()->diffInMinutes(), function () use ($count) {
            return Animes::withCount(['weekly_views'])->orderByDesc('weekly_views_count')->limit($count)->get()->random($count);
        });
    }

    public function animesInRelease() {
        return Animes::where('status', 0)->orderByDesc('year')->get();
    }

    public function episodesInRelease($take) {
        return AnimesSeasonsEpisodes::query()->select(DB::raw('animo_animes_seasons_episodes.*'))
            ->join('animo_animes', 'animo_animes_seasons_episodes.anime_id', '=', 'animo_animes.id')
            ->leftJoin('animo_animes_seasons', 'animo_animes_seasons.id', '=', 'animo_animes_seasons_episodes.season_id')
            ->whereHas('anime', function ($query) {
                $query->where('status', 0);
            })
            ->orderByDesc('animo_animes.latest_episode')
            ->orderByDesc('animo_animes_seasons.season')
            ->orderByDesc('animo_animes_seasons_episodes.episode')
            ->get()->unique('anime_id')->take($take);
    }

    public function animesAndEpisoesByWeek() {
        return Week::query()->with(['animes' => function($query) {
            $query->orderByDesc('hour')->with([
                'seasons' => function($query) {
                    return $query->orderByDesc('season')->with([
                        'episodes' => function($query) {
                            return $query->orderByDesc('episode');
                        }
                    ]);
                }
            ])->whereHas('anime', function($query) {
                $query->where('status', 0);
            });
        }])->get()
        ;
    }

    public function recentEpisodesViews($limit) {
        return AnimesSeasonsEpisodes::orderByDesc('access_at')->with('anime')->limit($limit)->get();
    }

    public function latestAnimes($limit) {
        return Animes::orderByDesc('created_at')->limit($limit)->get();
    }

    public function getAnimeOrFail($key, $value) {
        return Animes::where($key, $value)->with([
            'seasons' => function($query) {
                return $query->orderByDesc('season')->with([
                    'episodes' => function($query) {
                        return $query->orderByDesc('episode');
                    }
                ]);
            }
        ])->firstOrFail();
    }

    public function getSimilarAnimes($anime, $limit) {
        $animes = Animes::query()->where('id', '!=', $anime->id);
        $animes->whereHas('genres', function ($query) use ($anime) {
            $query->whereIn('genre_id', $anime->genres()->pluck('genre_id'));
        })->withCount(['weekly_views']);
        return $animes->orderByDesc('weekly_views_count')->limit($limit)->get()->take($limit);
    }

    public function getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug) {
        return AnimesSeasonsEpisodes::whereHas('anime', function ($query) use ($anime_slug) {
            return $query->where('slug_name', $anime_slug);
        })->withCount(['views', 'comments'])->with(['anime', 'episodes' => function($query) {
            $query->orderBy('episode');
        }])->where('season_id', $season)->where('episode', $episode)->where('slug', $episode_slug)->firstOrFail();
    }

    public function getEpisodes($anime) {
        return AnimesSeasonsEpisodes::query()->select(DB::raw('animo_animes_seasons_episodes.*'))
            ->join('animo_animes', 'animo_animes_seasons_episodes.anime_id', '=', 'animo_animes.id')
            ->join('animo_animes_seasons', 'animo_animes_seasons.id', '=', 'animo_animes_seasons_episodes.season_id')
            ->where('animo_animes.id', $anime->id)
            ->orderBy('animo_animes_seasons.season')
            ->orderBy('animo_animes_seasons_episodes.episode')
            ->distinct()
            ->get();
    }

    public function getWatchOrFail($session, $key, $id, $slug) {
        if ($session->has('KEY')) {
            if ($session->pull("KEY") == $key) {
                $query = AnimesSeasonsEpisodes::where('id', $id)->where('slug', $slug);
                $query->update(['access_at' => Carbon::now()]);
                $episode = $query->firstOrFail();
                if (ZAnimesControl::hashing($episode->season_id, $episode->episode) == $key) {
                    return $episode;
                }
            }
        }
        return abort('403');
    }

    public function checkWatchAccess($address, $anime_id, $season_id, $episode_id) {
        return AnimesSeasonsEpisodesViews::where('address', $address)->where('anime_id', $anime_id)->where('season_id', $season_id)->where('episode_id', $episode_id)->where('created_at', '>=', Carbon::now()->addMinutes(-3))->doesntExist();
    }

    public function addWatchAccess($address, $anime_id, $season_id, $episode_id) {
        $view = new AnimesSeasonsEpisodesViews([
            'address' => $address,
            'anime_id' => $anime_id,
            'season_id' => $season_id,
            'episode_id' => $episode_id
        ]);
        $view->save();
    }

    public function episodeUser($user, $completed, $anime_id, $season_id, $episode_id, $current_time = 0)
    {
        if (UsersEpisodes::where('user_id', $user->id)->where('anime_id', $anime_id)->where('season_id', $season_id)->where('episode_id', $episode_id)->doesntExist()) {
            $episode = AnimesSeasonsEpisodes::where('anime_id', $anime_id)->where('season_id', $season_id)->where('id', $episode_id)->firstOrFail();
            $user_episode = new UsersEpisodes([
                'user_id' => $user->id,
                'anime_id' => $anime_id,
                'season_id' => $season_id,
                'episode_id' => $episode_id,
                'current_time' => $current_time,
                'duration' => $episode->duration,
                'completed' => 0
            ]);
            $user_episode->save();
        } else {
            $episode = UsersEpisodes::where('user_id', $user->id)->where('anime_id', $anime_id)->where('season_id', $season_id)->where('episode_id', $episode_id);
            if ($current_time >= $episode->first()->current_time) {
                $episode->update([
                    'current_time' => $current_time,
                    'completed' => $completed == "true" ? 1 : 0
                ]);
            }
        }
    }

    public function getUserEpisode($user, $anime_id, $season_id, $episode_id) {
        return UsersEpisodes::where('user_id', $user->id)->where('anime_id', $anime_id)->where('season_id', $season_id)->where('episode_id', $episode_id)->first();
    }

    public function flashEpisodeKey($session, $season, $episode) {
        $session->flash("KEY", ZAnimesControl::hashing($season, $episode));
    }

    public function paginateAnimes($request, $count) {
        $anime = Animes::query();
        if ($request->has("procura")) {
            if (!empty($request->procura)) {
                $anime->where('name', 'LIKE', '%' . str_replace(' ','%', $request->procura) . '%')
                    ->orWhere('slug_name', 'LIKE', '%' . $request->procura . '%');
            }
        }
        switch ($request->get(__('animes.type'))) {
            case __('animes._recents'):
                $anime->orderBy('created_at', 'desc');
                break;
            case __('animes._news'):
                $anime->orderBy('year', 'desc');
                break;
            default:
                $anime->orderBy('name', 'asc');
                break;
        }
        if ($request->has("author")) {
            $anime->orWhere('author', 'LIKE', '%'. $request->author .'%');
        }
        if ($request->has("genre")) {
            if (is_array($request->genre)) {
                foreach ($request->genre as $genre) {
                    $anime->whereHas('genres', function($query) use ($genre) {
                        $query->where('name', $genre);
                    });
                }
            }
        }
        if ($request->has("release")) {
            $anime->orWhere('year', $request->release);
        }
        if ($request->has("status:0")) {
            $anime->orWhere('status', 0);
        }
        if ($request->has("status:1")) {
            $anime->orWhere('status', 1);
        }
        $paginate = $anime->paginate($count);
        return $paginate;
    }

    function timeToSeconds($time, $seconds = 0) {
        foreach (array_reverse(explode(':', $time)) as $key => $value) {
            $seconds += pow(60, $key) * $value;
        };
        return $seconds;
    }

    public function getDuration($video)
    {
        try {
            $result = shell_exec('C:\FFmpeg\bin\ffmpeg -i ' . $video . ' 2>&1');
            preg_match('/(?<=Duration: )(\d{2}:\d{2}:\d{2})\.\d{2}/', $result, $match);
            return $match[1];
        } catch (\Exception $e) {
            throw new \Exception('Can\'t get video duration.');
        }
    }

    public function noobInitial($episodes, $id, $initial = 0) {
        foreach ($episodes as $_episode) {
            $initial++;
            if ($id == $_episode->id) {
                break;
            }
        }
        return $initial;
    }
}
