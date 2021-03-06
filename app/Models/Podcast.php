<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'podcast_id', 'id');
    }

    public function subs() 
    {
        return $this->hasMany(Subscription::class, 'podcast_id', 'id');
    }

    public function numSubs() 
    {
        return count($this->subs);
    }
}
