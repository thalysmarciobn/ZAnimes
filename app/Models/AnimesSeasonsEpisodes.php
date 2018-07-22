<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AnimesSeasonsEpisodes extends Model
{
    protected $table = 'animo_animes_seasons_episodes';

    protected $fillable = ['id', 'title', 'slug', 'episode', 'season_id', 'video', 'image', 'duration', 'prev', 'poster'];

    public function current() {
        return $this->hasOne('App\Models\UsersEpisodes','episode_id', 'id')->where('user_id', Auth::id())->select('episode_id', 'current_time', 'duration', DB::raw('(current_time * 100) / duration as current'));
    }

    public function season() {
        return $this->hasOne('App\Models\AnimesSeasons','id', 'season_id');
    }

    public function anime() {
        return $this->hasOne('App\Models\Animes','id', 'anime_id');
    }

    public function views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'episode_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesComments', 'episode_id');
    }

    public function next() {
        return self::where('id', '>', $this->id)->where('anime_id', $this->anime_id)->orderBy('id', 'asc')->first();
    }

    public  function previous() {
        return self::where('id', '<', $this->id)->where('anime_id', $this->anime_id)->orderBy('id', 'desc')->first();
    }
}
