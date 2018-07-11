<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AnimesSeasons extends Model
{
    protected $table = 'animo_animes_seasons';

    protected $fillable = ['anime_id', 'title', 'season'];

    public function episodes()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'season_id');
    }

    public function anime() {
        return $this->hasOne('App\Models\Animes', 'id', 'anime_id');
    }
}