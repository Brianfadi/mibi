<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Payment $payment
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Confirmed - MIBI',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.payment-confirmation',
            with: [
                'userName' => $this->payment->user->name,
                'amount' => number_format($this->payment->amount, 2),
                'currency' => $this->payment->currency,
                'reference' => $this->payment->payment_reference,
                'method' => $this->payment->payment_method,
            ],
        );
    }
}
