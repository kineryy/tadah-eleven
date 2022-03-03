<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'admin_only',
        'priority'
    ];

    public function threads()
    {
        return $this->hasMany('App\Models\ForumThread', 'category_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\ForumPost', 'category_id');
    }
}
