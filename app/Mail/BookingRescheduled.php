<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingRescheduled extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Booking $booking
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Rescheduled - MIBI',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.booking-rescheduled',
            with: [
                'userName' => $this->booking->user->name,
                'serviceName' => $this->booking->service?->title ?? 'Coaching Session',
                'scheduledAt' => $this->booking->scheduled_at->format('l, F j, Y g:i A'),
            ],
        );
    }
}
