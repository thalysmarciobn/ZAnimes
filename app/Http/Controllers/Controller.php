<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController {

    public function api_animes(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->animes());
    }

    public function api_genres(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->genres());
    }

    public function api_episode(Request $request, ZAnimesInterface $z_animes) {
        if ($z_animes->checkEpisodeUser(Auth::user(), $request->episode_id, $request->current_time, $request->duration)) {
            $z_animes->addEpisodeUser(Auth::user(), $request->episode_id, $request->current_time, $request->duration);
        } else {
            $z_animes->updateEpisodeUser(Auth::user(), $request->episode_id, $request->current_time, $request->duration);
        }
    }

    public function watch(ZAnimesInterface $z_animes, $key, $id, $slug) {
        $episode = $z_animes->getWatchOrFail(session(), $key, $id, $slug);
        if ($z_animes->checkWatchAccess(request()->ip(), $episode->anime_id, $episode->season_id, $episode->id)) {
            $z_animes->addWatchAccess(request()->ip(), $episode->anime_id, $episode->season_id, $episode->id);
        }
        return view('watch.frame', [
            'episode' => $episode
        ]);
    }
}
