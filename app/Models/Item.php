<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'creator',
        'price',
        'onsale',
        'approved',
        'type',
        'sales',
        'thumbnail_url'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'creator');
    }

    public function isXmlAsset()
    {
        return $this->type == "Hat" || $this->type == "Model" || $this->type == "Gear" || $this->type == "Package" || $this->type == "Head";
    }

    public function getXmlContents()
    {
        if (Storage::disk('public')->exists('items/' . $this->id)) {
            return Storage::disk('public')->get('items/' . $this->id);
        } else {
            return false;
        }
    }
}
