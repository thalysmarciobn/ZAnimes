<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token', 'editor', 'avatar', 'avatar_pending', 'avatar_update'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function animes() {
        return $this->hasMany('App\Models\Animes', 'user_id')->orderByDesc('created_at');
    }

    public function staffLog() {
        return $this->hasMany('App\Models\LogsStaff', 'user_id');
    }
}
