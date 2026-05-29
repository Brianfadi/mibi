<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Registration $registration
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We Received Your Application - MIBI',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.registration-confirmation',
            with: [
                'name' => $this->registration->full_name,
            ],
        );
    }
}
