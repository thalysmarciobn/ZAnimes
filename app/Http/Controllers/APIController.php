<?php
namespace App\Http\Controllers;

use App\Models\AnimesSeasonsEpisodes;
use App\Services\Contracts\ZAnimesInterface;

class APIController extends Controller {

    public function latestRelease() {
        return response()->json(AnimesSeasonsEpisodes::whereHas('anime', function ($query) {
            return $query->where('status', 0);
        })->orderByDesc('created_at')->with('anime')->get(['title', 'slug', 'anime_id', 'episode', 'season_id', 'image', 'image', 'duration', 'prev'])->unique('anime_id')->take(1)->toJSON());
    }

    public function genres(ZAnimesInterface $z_animes) {
        return response()->json($z_animes->genres());
    }

}
