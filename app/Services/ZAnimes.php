<?php

namespace App\Services;

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
            return Animes::all()->random($count);
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

    public function getEpisodeOrFail($anime_slug, $season, $episode, $episode_slug) {
        return AnimesSeasonsEpisodes::whereHas('anime', function ($query) use ($anime_slug) {
            return $query->where('slug_name', $anime_slug);
        })->withCount(['views', 'comments'])->where('season_id', $season)->where('episode', $episode)->where('slug', $episode_slug)->firstOrFail();
    }

    public function getWatchOrFail($session, $key, $id, $slug) {
        if ($session->has('KEY')) {
            if ($session->pull("KEY") == $key) {
                $episode = AnimesSeasonsEpisodes::where('id', $id)->where('slug', $slug)->firstOrFail();
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

    public function checkEpisodeUser($user, $episode_id, $current_time, $duration) {
        return $users_episodes = UsersEpisodes::where('user_id', $user->id)->where('episode_id', $episode_id)->doesntExist();
    }

    public function addEpisodeUser($user, $episode_id, $current_time, $duration) {
        $episode = new UsersEpisodes([
            'user_id' => $user->id,
            'episode_id' => $episode_id,
            'current_time' => $current_time,
            'duration' => $duration
        ]);
        $episode->save();
    }

    public function updateEpisodeUser($user, $episode_id, $current_time, $duration) {
        UsersEpisodes::where('user_id', $user->id)->where('episode_id', $episode_id)->update([
            'current_time' => $current_time,
            'duration' => $duration
        ]);
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
                $anime->orderBy('latest_episode', 'desc');
                break;
            case __('animes._news'):
                $anime->orderBy('created_at', 'desc');
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
                    $anime->orWhere("genres", 'LIKE', '%' . $genre . '%');
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
}