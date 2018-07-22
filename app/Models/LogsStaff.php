<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogsStaff extends Model {

    protected $table = 'logs_staff';

    protected $fillable = ['id', 'user_id', 'message'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
