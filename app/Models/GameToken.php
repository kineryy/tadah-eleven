<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameToken extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function server() {
        return $this->belongsTo('App\Models\Server', 'server_id');
    }
}
