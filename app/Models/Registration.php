<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id', 'status', 'relationship_status', 'relationship_challenges',
        'emotional_wellbeing', 'goals', 'preferred_session_type',
        'program_interested', 'communication_preference', 'emergency_contact_info',
        'admin_notes', 'assigned_coach_id', 'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedCoach()
    {
        return $this->belongsTo(User::class, 'assigned_coach_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function approve(?int $coachId = null): void
    {
        $this->update([
            'status' => 'approved',
            'assigned_coach_id' => $coachId,
            'approved_at' => now(),
        ]);
    }

    public function reject(): void
    {
        $this->update(['status' => 'rejected']);
    }
}
