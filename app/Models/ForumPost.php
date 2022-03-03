<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'thread_id',
        'user_id',
        'body',
        'stickied'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ForumCategory', 'category_id');
    }

    public function thread()
    {
        return $this->belongsTo('App\Models\ForumThread', 'thread_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
