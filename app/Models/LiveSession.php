<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class LiveSession extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'slug', 'description', 'image',
        'session_date', 'start_time', 'end_time', 'timezone',
        'meeting_link', 'max_participants', 'is_free', 'price',
        'session_type', 'is_active', 'metadata',
    ];

    protected function casts(): array
    {
        return [
            'session_date' => 'date',
            'start_time' => 'string',
            'end_time' => 'string',
            'max_participants' => 'integer',
            'is_free' => 'boolean',
            'is_active' => 'boolean',
            'price' => 'decimal:2',
            'metadata' => 'array',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'live_session_user')
            ->withPivot('attended', 'registered_at')
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('session_date', '>=', now()->toDateString())
            ->where('is_active', true);
    }

    public function scopePast($query)
    {
        return $query->where('session_date', '<', now()->toDateString());
    }

    public function getStartTimeFormattedAttribute(): string
    {
        return date('g:i A', strtotime($this->start_time));
    }

    public function getEndTimeFormattedAttribute(): string
    {
        if (!$this->end_time) {
            return '';
        }
        return date('g:i A', strtotime($this->end_time));
    }

    public function getRegisteredCountAttribute(): int
    {
        return $this->participants()->count();
    }

    public function getFormattedPriceAttribute(): string
    {
        if (!$this->price) {
            return 'Free';
        }
        return 'KES ' . number_format($this->price, 0);
    }

    public function hasAvailableSpots(): bool
    {
        if (!$this->max_participants) {
            return true;
        }
        return $this->registered_count < $this->max_participants;
    }

    public function isUpcoming(): bool
    {
        return $this->session_date >= now()->toDateString();
    }
}
