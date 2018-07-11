<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'animo_genres';
    protected $primaryKey = 'slug';
    public $incrementing = false; // string

    public function scopeKey($query, $name)
    {
        return $query->where('slug_name', $name);
    }
}