<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeekAnimes extends Model
{
    protected $table = 'animo_week_animes';

    protected $fillable = ['week_id', 'anime_id', 'hour'];

    public function anime()
    {
        return $this->hasOne('App\Models\Animes', 'id', 'anime_id')->where('status', 0);
    }
}
