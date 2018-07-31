<?php

namespace App\Http\Controllers;

use App\Models\Animes;
use App\Models\AnimesSeasons;
use App\Models\AnimesSeasonsEpisodes;
use App\ZAnimesControl;
use Carbon\Carbon;
use Crawler;
use Intervention\Image\Facades\Image;
use App\Services\Contracts\ZAnimesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController {

    public function add(Request $request, ZAnimesInterface $ZAnimes, $key) {
        print "ok\n aa kosdkaop kdpo aksdp \n aoskdpasd";
        //['id', 'title', 'slug', 'episode', 'season_id', 'video', 'image', 'duration', 'prev']
        if ($key == "DS54SDSDAS56AS4DAS654D9ASA") {
            if ($request->hasAny(['anime_id', 'season', 'episode', 'title', 'sinopse', 'media', 'image'])) {
                $anime = Animes::query()->where('id', $request->anime_id)->first();
                $season = AnimesSeasons::query()->where('anime_id', $anime->id)->where('title', $request->season)->first();
                if (AnimesSeasonsEpisodes::query()->where('season_id', $season->id)->where('episode', $request->episode)->doesntExist()) {
                    $episode = new AnimesSeasonsEpisodes([
                        'title' => $request->title,
                        'slug' => str_slug($request->title),
                        'episode' => floatval($request->episode),
                        'season_id' => $season->id,
                        'video' => $request->media,
                        'image' => $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . ".jpg?" . str_random(20),
                        'duration' => $ZAnimes->timeToSeconds($ZAnimes->getDuration($request->media)),
                        'prev' => json_decode('"' . $request->sinopse . '"')
                    ]);
                    ZAnimesControl::put("animes/" . $anime->slug_name . "/episodes/" . $season->season . "_" . $request->episode . ".jpg", Image::make($request->image)->resize(640, 360)->encode('jpg', 80));
                    $anime->latest_episode = Carbon::now();
                    $anime->episodes()->save($episode);
                    $anime->save();
                }

            }
        }
    }

    public function api_banner(ZAnimesInterface $z_animes) {
        header('Content-type: image/png');
        $out = imagecreatetruecolor(400, 230);

        $jpeg = imagecreatefromjpeg('http://cdn.zanimes.com/animes/nanatsu-no-taizai/episodes/3_23.jpg?lTSYRrZKNRh9tmxhnXj2');

        imagecopyresampled($out, $jpeg, 0, 0, 0, 0, 200, 200, 600, 600);

        header('Content-type: image/png');
        imagepng($out);
        imagedestroy($out);
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
        $user = optional(Auth::user());
        return view('watch.frame', [
            'episode' => $episode,
            'user' => $user,
            'cache' => $z_animes->getUserEpisode($user, $episode->anime_id, $episode->season_id, $episode->id),
            'next' => $episode->next()
        ]);
    }
}
