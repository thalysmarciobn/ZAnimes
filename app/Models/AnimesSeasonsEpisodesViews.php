<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodesViews extends Model
{
    protected $table = 'animo_animes_seasons_episodes_views';

    protected $fillable = ['episode', 'address'];

    public function episode() {
        return $this->hasOne('App\Models\AnimesSeasonsEpisodes', 'id', 'episode');
    }
}