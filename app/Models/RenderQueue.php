<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenderQueue extends Model
{
    use HasFactory;

    protected $table = "render_queue";

    protected $fillable = [
        'type',
        'target_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'target_id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'target_id');
    }
}
