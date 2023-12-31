<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'animo_genres';

    public function scopeKey($query, $name)
    {
        return $query->where('slug_name', $name);
    }

    public function animes() {
        return $this->belongsToMany('App\Models\Animes', 'animo_genres_animes','anime_id', 'genre_id', 'id');
    }
}
