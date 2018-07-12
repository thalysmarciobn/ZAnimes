<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodes extends Model
{
    protected $table = 'animo_animes_seasons_episodes';

    protected $fillable = ['id', 'title', 'episode', 'season_id', 'video', 'image', 'duration', 'prev', 'poster'];

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
}