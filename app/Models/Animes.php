<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animes extends Model
{
    protected $table = 'animo_animes';

    protected $fillable = ['id', 'name', 'slug_name', 'sinopse', 'image', 'author', 'status', 'year', 'genres', 'user_id'];

    public function seasons() {
        return $this->hasMany('App\Models\AnimesSeasons', 'anime_id', 'id')->orderByDesc('id');
    }

    public function episodes()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodes', 'anime_id')->orderByDesc('id');
    }

    public function genres() {
        return Genres::whereIn('slug', explode(',', $this->genres))->get();
    }

    public function monthly_views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'anime_id')->where('created_at', '>=', Carbon::now()->addDays(-29)->format('Y-m-d H:i:s'));
    }

    public function creator() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}