<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'creator',
        'ip',
        'port',
        'secret'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'creator');
    }
}
