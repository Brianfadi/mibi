<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'description', 'short_description',
        'icon', 'image', 'price', 'currency', 'duration_minutes',
        'session_type', 'highlights', 'is_active', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'duration_minutes' => 'integer',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'highlights' => 'array',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('session_type', $type);
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
        if (!$this->duration_minutes) {
            return '';
        }
        $hours = intdiv($this->duration_minutes, 60);
        $mins = $this->duration_minutes % 60;
        if ($hours > 0) {
            return $hours . 'h' . ($mins > 0 ? ' ' . $mins . 'min' : '');
        }
        return $mins . ' minutes';
    }
}
