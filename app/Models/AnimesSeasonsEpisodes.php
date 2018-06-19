<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodes extends Model
{
    protected $table = 'animo_animes_seasons_episodes';

    public function scopeLatestEpisodes($query)
    {
        return $query->where('hidden', 0)->orderBy('created_at', 'desc');
    }
}