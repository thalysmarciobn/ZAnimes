<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'animo_animes';

    protected $fillable = ['id', 'name', 'slug_name', 'sinopse', 'image', 'author', 'latest_episode', 'status', 'year', 'age_group', 'studio', 'user_id'];

    public function seasons() {
        return $this->hasMany('App\Models\AnimesSeasons', 'anime_id', 'id')->orderByDesc('season');
    }

    public function episodes() {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime_id');
    }

    public function latestEpisode() {
        return $this->hasOne('App\Models\AnimesSeasonsEpisodes', 'anime_id');
    }

    public function genres() {
        return $this->belongsToMany('App\Models\Genres', 'animo_genres_animes','anime_id', 'genre_id', 'id');
    }

    public function monthly_views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'anime_id')->where('created_at', '>=', Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'));
    }

    public function weekly_views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'anime_id')->where('created_at', '>=', Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'));
    }

    public function creator() {
        return $this->hasOne('App\User', 'id', 'user_id')->with('staffLog');
    }

    public function staffLog() {
        return $this->hasMany('App\Models\LogsStaff', 'user_id', 'user_id');
    }
}
