<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'body',
        'stickied',
        'locked'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ForumCategory', 'category_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\ForumPost', 'thread_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
