<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'animo_animes';

    public function scopeAnimesInRelease($query)
    {
        return $query->where('status', 0);
    }

    public function seasons()
    {
        return $this->hasMany('App\Models\AnimesSeasons', 'anime');
    }

    public function episodes()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime')->orderBy('season', 'desc')->orderBy('episode', 'desc');
    }

    public function scopeLatestCreated($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeKey($query, $name)
    {
        return $query->where('slug_name', $name);
    }
}