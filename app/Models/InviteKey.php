<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator',
        'token',
        'uses'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'creator');
    }
}
