<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message'];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'read_at' => 'datetime',
        ];
    }

    public function reader()
    {
        return $this->belongsTo(User::class, 'read_by');
    }

    public function markAsRead(int $userId): void
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
            'read_by' => $userId,
        ]);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
