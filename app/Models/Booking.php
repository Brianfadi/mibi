<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'service_id', 'coach_id', 'scheduled_at', 'end_at',
        'session_type', 'status', 'timezone', 'notes',
        'cancellation_reason', 'meeting_link', 'metadata',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'end_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('scheduled_at', '>=', now())
            ->whereIn('status', ['pending', 'confirmed']);
    }

    public function scopeForDate($query, $date)
    {
        return $query->whereDate('scheduled_at', $date);
    }

    public function isUpcoming(): bool
    {
        return $this->scheduled_at >= now() && in_array($this->status, ['pending', 'confirmed']);
    }

    public function canCancel(): bool
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    public function canReschedule(): bool
    {
        return in_array($this->status, ['pending', 'confirmed'])
            && $this->scheduled_at->diffInHours(now()) >= 24;
    }
}
