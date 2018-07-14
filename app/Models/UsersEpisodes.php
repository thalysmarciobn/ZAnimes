<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersEpisodes extends Model {

    protected $table = 'users_episodes';

    protected $fillable = ['id', 'user_id', 'episode_id', 'current_time', 'duration'];
}