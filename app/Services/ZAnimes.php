<?php

namespace App\Services;

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
        return AnimesSeasonsEpisodes::whereHas('anime', function ($query) {
            return $query->where('status', 0);
        })->orderByDesc('created_at')->with('anime')->get()->unique('anime_id')->take($take);
    }

    public function recentEpisodesViews($limit) {
        return AnimesSeasonsEpisodes::orderByDesc('access_at')->with('anime')->limit($limit)->get();
    }

    public function latestAnimes($limit) {
        return Animes::orderByDesc('created_at')->limit($limit)->get();
    }

    public function getAnimeOrFail($key, $value) {
        return Animes::where($key, $value)->firstOrFail();
    }

    public function getSimilarAnimes($anime, $limit) {
        $animes = Animes::query()->where('id', '!=', $anime->id);
        $animes->withCount(['genres' => function ($query) use ($anime) {
            foreach ($anime->genres()->get() as $genre) {
                $query->orWhere('genre_id', $genre->id);
            }
        }]);
        return $animes->orderByDesc('genres_count')->get()->take($limit);
    }

    public function getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug) {
        return AnimesSeasonsEpisodes::whereHas('anime', function ($query) use ($anime_slug) {
            return $query->where('slug_name', $anime_slug);
        })->withCount(['views', 'comments'])->with('anime')->where('season_id', $season)->where('episode', $episode)->where('slug', $episode_slug)->firstOrFail();
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
        return AnimesSeasonsEpisodesViews::where('address', $address)->where('anime_id', $anime_id)->where('season_id', $season_id)->where('episode_id', $episode_id)->where('created_at', '>=', Carbon::now()->addMinutes(-30))->doesntExist();
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
                $anime->where('name', 'LIKE', '%' . $request->procura . '%')
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

    public function noobInitial($episodes, $id, $initial = 0, $_initial = 0) {
        $count = $episodes->count();

            foreach ($episodes as $_episode) {
                $initial++;
                if ($id == $_episode->id) {
                    break;
                }
                if ($count > 5) {
                    if ($initial > 2 && $count > $initial + 2) {
                        $_initial++;
                    }
                }
            }
        return [$initial, $_initial];
    }
}
