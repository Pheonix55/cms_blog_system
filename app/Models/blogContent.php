<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogContent extends Model
{

    protected $fillable = [
        'blog_id',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'featured_image',
        'show_author',
        'date_published',
        'date_edited',
    ];
}
