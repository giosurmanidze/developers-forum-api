<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'category_topic', 'topic_id', 'category_id');
    }
}
