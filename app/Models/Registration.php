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
        'full_name', 'age', 'gender', 'country', 'city', 'nationality',
        'phone', 'email', 'occupation', 'relationship_length', 'challenge_type',
        'challenge_explanation', 'emotional_effects', 'has_spoken_to_someone',
        'support_hoping_for', 'interested_sessions', 'selected_program',
        'preferred_session_format', 'willing_to_participate', 'personal_goals',
        'terms_accepted', 'form_data', 'payment_method', 'payment_phone', 'payment_reference',
    ];

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
            'has_spoken_to_someone' => 'boolean',
            'willing_to_participate' => 'string',
            'emotional_effects' => 'array',
            'terms_accepted' => 'boolean',
            'interested_sessions' => 'array',
            'form_data' => 'array',
            'age' => 'integer',
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
