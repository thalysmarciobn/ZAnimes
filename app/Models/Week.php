<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $table = 'animo_week';

    protected $fillable = ['id', 'title'];

    public function animes()
    {
        return $this->hasMany('App\Models\WeekAnimes', 'week_id')->orderByDesc('hour');
    }
}
