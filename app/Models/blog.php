<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'status',
        'published_at',
        'user_id',
        'category_id',
        'tags',
        'featured_image',
        'meta_title',
        'meta_description'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReadingTime(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);
        return "{$minutes} min read";
    }
}

