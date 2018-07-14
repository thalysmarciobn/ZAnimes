<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodesComments extends Model {

    protected $table = 'animo_animes_seasons_episodes_comments';

    protected $fillable = ['id', 'user_id', 'episode_id', 'comment', 'address'];

    public function episode() {
        return $this->hasOne('App\Models\AnimesSeasonsEpisodes', 'id', 'episode_id');
    }

    public function creator() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}