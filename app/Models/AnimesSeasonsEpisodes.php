<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimesSeasonsEpisodes extends Model
{
    protected $table = 'animo_animes_seasons_episodes';

    protected $fillable = ['id', 'title', 'episode', 'season_id', 'video', 'image', 'duration', 'prev', 'poster'];

    public function current($user_id, $episode_id) {
        try {
            $user_episode = UsersEpisodes::where('user_id', $user_id)->where('episode_id', $episode_id)->first();
            if ($user_episode != null) {
                return ($user_episode["current_time"] * 100) / $user_episode["duration"];
            }
        } catch (\Exception $e) {
            return 0;
        }
        return 0;
    }

    public function season() {
        return $this->hasOne('App\Models\AnimesSeasons','id', 'season_id');
    }

    public function anime() {
        return $this->hasOne('App\Models\Animes','id', 'anime_id');
    }

    public function views()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesViews', 'episode_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\AnimesSeasonsEpisodesComments', 'episode_id');
    }
}