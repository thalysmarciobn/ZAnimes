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
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'season');
    }
}