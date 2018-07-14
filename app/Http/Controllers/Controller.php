<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController {

    public function api_animes(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->animes());
    }

    public function api_genres(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->genres());
    }

    public function api_episode(Request $request, ZAnimesInterface $z_animes) {
        $validator = Validator::make($request->all(), [
            'anime_id' => 'required|max:255',
            'season_id' => 'required|max:255',
            'episode_id' => 'required|max:255',
            'current_time' => 'required|max:255',
            'duration' => 'required|max:255'
        ], [
            'anime_id.required',
            'season_id.required',
            'episode_id.required',
            'current_time.required',
            'duration.required'
        ]);
        if ($validator->fails()) {
            return abort(403);
        }
        if ($request->current_time != 0 || $request->duration != 0) {
            if ($z_animes->checkEpisodeUser(Auth::user(),$request->anime_id, $request->season_id, $request->episode_id, $request->current_time, $request->duration)) {
                $z_animes->addEpisodeUser(Auth::user(), $request->anime_id, $request->season_id, $request->episode_id, $request->current_time, $request->duration);
            } else {
                $z_animes->updateEpisodeUser(Auth::user(), $request->anime_id, $request->season_id, $request->episode_id, $request->current_time, $request->duration);
            }
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
