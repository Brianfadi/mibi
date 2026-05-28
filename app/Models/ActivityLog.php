<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['subject_id', 'subject_type', 'user_id', 'action', 'description', 'properties'];

    protected function casts(): array
    {
        return [
            'properties' => 'array',
        ];
    }

    public function subject()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function log($subject, string $action, string $description, ?array $properties = null): self
    {
        return static::create([
            'subject_id' => $subject?->id,
            'subject_type' => $subject ? get_class($subject) : null,
            'user_id' => auth()->id(),
            'action' => $action,
            'description' => $description,
            'properties' => $properties,
        ]);
    }

    public function scopeRecent($query)
    {
        return $query->latest()->limit(20);
    }
}
