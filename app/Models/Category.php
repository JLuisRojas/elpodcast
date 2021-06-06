<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function podCount() {
        return Podcast::where('category_id', $this->id)
            ->count();
    }
}
