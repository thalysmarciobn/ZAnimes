<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'animo_animes';

    protected $fillable = ['id', 'name', 'slug_name', 'sinopse', 'image', 'author', 'status', 'year', 'genres', 'userid'];

    public function seasons() {
        return $this->hasMany('App\Models\AnimesSeasons', 'anime_id', 'id')->orderBy('id', 'desc');
    }

    public function latestEpisodes($limit = 1)
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime_id')->orderBy('season_id', 'desc')->orderBy('episode', 'desc')->limit($limit)->get();
    }

    public function episodes()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime_id');
    }

    public function monthly_views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'anime_id')->where('created_at', '>=', Carbon::now()->addDays(-29)->format('Y-m-d H:i:s'));
    }

    public function creator() {
        return $this->hasOne('App\User', 'id', 'userid');
    }

    public function scopeLatestCreated($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}