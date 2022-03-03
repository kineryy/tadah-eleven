<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnedItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'wearing'
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
}
