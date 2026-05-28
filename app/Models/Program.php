<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Program extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'image',
        'price', 'currency', 'duration_value', 'duration_unit',
        'max_participants', 'features', 'prerequisites',
        'is_active', 'is_featured', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'max_participants' => 'integer',
            'features' => 'array',
            'prerequisites' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedPriceAttribute(): string
    {
        if (!$this->price) {
            return 'Free';
        }
        return $this->currency . ' ' . number_format($this->price, 2);
    }

    public function getDurationLabelAttribute(): string
    {
        if (!$this->duration_value || !$this->duration_unit) {
            return '';
        }
        return $this->duration_value . ' ' . $this->duration_unit;
    }
}
