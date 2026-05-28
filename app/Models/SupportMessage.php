<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    protected $fillable = [
        'support_ticket_id', 'user_id', 'message', 'attachments', 'is_staff',
    ];

    protected function casts(): array
    {
        return [
            'attachments' => 'array',
            'is_staff' => 'boolean',
        ];
    }

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
