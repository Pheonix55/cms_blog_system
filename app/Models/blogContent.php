<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogContent extends Model
{
    protected $fillable = [
        'blog_id', 'type', 'content', 
        'image_caption', 'image_alt', 'order'
    ];
}
