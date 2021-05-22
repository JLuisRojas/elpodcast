<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public function podcast()
    {
        return $this->hasOne(Podcast::class, 'id', 'podcast_id');
    }
}
