<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersEpisodes extends Model {

    protected $table = 'users_episodes';

    protected $fillable = ['id', 'user_id', 'anime_id', 'season_id', 'episode_id', 'current_time', 'duration'];
}