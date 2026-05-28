<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasApiTokens, HasRoles, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'bio', 'avatar',
        'timezone', 'is_active', 'gender', 'date_of_birth',
        'emergency_contact',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'date_of_birth' => 'date',
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function coachingSessions()
    {
        return $this->hasMany(Booking::class, 'coach_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function liveSessions()
    {
        return $this->belongsToMany(LiveSession::class, 'live_session_user')
            ->withPivot('attended', 'registered_at')
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCoaches($query)
    {
        return $query->role('coach');
    }

    public function scopeClients($query)
    {
        return $query->role('client');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isCoach(): bool
    {
        return $this->hasRole('coach');
    }
}
