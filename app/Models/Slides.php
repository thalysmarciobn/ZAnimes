<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model {

    protected $table = 'animo_slides';

    protected $fillable = ['id', 'anime_id', 'image'];

    public function anime() {
        return $this->hasOne('App\Models\Animes', 'id', 'anime_id');
    }
}
