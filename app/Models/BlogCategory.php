<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BlogCategory extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug', 'description', 'color', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_category');
    }

    public function publishedPosts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_category')
            ->where('is_published', true)
            ->where('published_at', '<=', now());
    }
}
