<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'animo_animes';

    protected $fillable = ['id', 'name', 'slug_name', 'sinopse', 'image', 'author', 'status', 'year', 'genres', 'userid'];

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

    public function creator() {
        return $this->hasOne('App\User', 'id', 'userid');
    }

    public function scopeLatestCreated($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}