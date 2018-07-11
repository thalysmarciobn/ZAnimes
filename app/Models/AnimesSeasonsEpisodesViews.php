<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodesViews extends Model
{
    protected $table = 'animo_animes_seasons_episodes_views';

    protected $fillable = ['id', 'anime_id', 'season_id', 'episode_id', 'address'];

    public function episode() {
        return $this->hasOne('App\Models\AnimesSeasonsEpisodes', 'id', 'episode_id');
    }

    public function anime() {
        return $this->hasOne('App\Models\Animes', 'id', 'anime_id');
    }
}