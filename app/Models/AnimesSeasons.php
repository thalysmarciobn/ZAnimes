<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AnimesSeasons extends Model
{
    protected $table = 'animo_animes_seasons';

    protected $fillable = ['anime', 'title', 'season'];

    public function episodes()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime');
    }

    public function scopeGetSeasonByAnime($query, $anime)
    {
        return $query->where('anime', $anime);
    }

    public function scopeGetSeason($query, $anime, $season)
    {
        return $query->where('anime', $anime)->where('season', $season);
    }
}