<?php

namespace App\Http\Controllers;

use Crawler;
use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController {

    public function api_banner(ZAnimesInterface $z_animes) {
        header('Content-type: image/png');
        $out = imagecreatetruecolor(400, 230);

        $jpeg = imagecreatefromjpeg('http://cdn.zanimes.com/animes/nanatsu-no-taizai/episodes/3_23.jpg?lTSYRrZKNRh9tmxhnXj2');

        imagecopyresampled($out, $jpeg, 0, 0, 0, 0, 200, 200, 600, 600);

        header('Content-type: image/png');
        imagepng($out);
        imagedestroy($out);
    }

    public function api_animes(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->animes());
    }

    public function api_genres(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->genres());
    }

    public function setEpisode(Request $request, ZAnimesInterface $z_animes) {
        $validator = Validator::make($request->all(), [
            'completed' => 'required|max:255',
            'anime_id' => 'required|max:255',
            'season_id' => 'required|max:255',
            'episode_id' => 'required|max:255',
            'current_time' => 'required|max:255'
        ], [
            'completed.required',
            'anime_id.required',
            'season_id.required',
            'episode_id.required',
            'current_time.required'
        ]);
        if ($validator->fails()) {
            return abort(403);
        }
        if ($request->current_time != (0 || "0") || $request->duration != (0 || "0")) {
            $z_animes->episodeUser(Auth::user(), $request->completed, $request->anime_id, $request->season_id, $request->episode_id, $request->current_time);
        }
    }

    public function watch(ZAnimesInterface $z_animes, $key, $id, $slug) {
        $episode = $z_animes->getWatchOrFail(session(), $key, $id, $slug);
        if (!Crawler::isCrawler() && $z_animes->checkWatchAccess(request()->ip(), $episode->anime_id, $episode->season_id, $episode->id)) {
            $z_animes->addWatchAccess(request()->ip(), $episode->anime_id, $episode->season_id, $episode->id);
        }
        return view('watch.frame', [
            'episode' => $episode,
            'cache' => $z_animes->getUserEpisode(Auth::user(), $episode->anime_id, $episode->season_id, $episode->id),
            'next' => $episode->next()
        ]);
    }
}
