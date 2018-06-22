<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodes extends Model
{
    protected $table = 'animo_animes_seasons_episodes';

    protected $fillable = ['title', 'anime', 'episode', 'season', 'video', 'image', 'hidden', 'duration', 'prev', 'poster'];

    public function scopeLatestEpisodes($query)
    {
        return $query->where('hidden', 0)->orderBy('created_at', 'desc');
    }

    public function getAnime() {
        return $this->hasOne('App\Models\Animes', 'id', 'anime');
    }
}