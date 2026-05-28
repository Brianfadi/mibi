<?php

namespace App\Services\Notification;

use App\Mail\BookingConfirmation;
use App\Mail\BookingConfirmed;
use App\Mail\BookingCancelled;
use App\Mail\BookingRescheduled;
use App\Mail\PaymentConfirmation;
use App\Mail\ContactNotification;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function __construct(
        private WhatsAppService $whatsappService
    ) {}

    public function sendBookingConfirmation(Booking $booking): void
    {
        try {
            Mail::to($booking->user->email)
                ->send(new BookingConfirmation($booking));

            $this->whatsappService->sendMessage(
                $booking->user->phone,
                "Hi {$booking->user->name}, your MIBI booking has been received. We'll confirm shortly. Booking: {$booking->scheduled_at->format('D, M j, Y g:i A')}"
            );
        } catch (\Exception $e) {
            Log::error('Failed to send booking confirmation: ' . $e->getMessage());
        }
    }

    public function sendBookingConfirmed(Booking $booking): void
    {
        try {
            Mail::to($booking->user->email)
                ->send(new BookingConfirmed($booking));
        } catch (\Exception $e) {
            Log::error('Failed to send booking confirmed: ' . $e->getMessage());
        }
    }

    public function sendBookingCancelled(Booking $booking): void
    {
        try {
            Mail::to($booking->user->email)
                ->send(new BookingCancelled($booking));
        } catch (\Exception $e) {
            Log::error('Failed to send booking cancelled: ' . $e->getMessage());
        }
    }

    public function sendBookingRescheduled(Booking $booking): void
    {
        try {
            Mail::to($booking->user->email)
                ->send(new BookingRescheduled($booking));
        } catch (\Exception $e) {
            Log::error('Failed to send booking rescheduled: ' . $e->getMessage());
        }
    }

    public function sendPaymentConfirmation(Payment $payment): void
    {
        try {
            Mail::to($payment->user->email)
                ->send(new PaymentConfirmation($payment));
        } catch (\Exception $e) {
            Log::error('Failed to send payment confirmation: ' . $e->getMessage());
        }
    }

    public function sendContactNotification(Contact $contact): void
    {
        try {
            Mail::to(config('mail.admin_address'))
                ->send(new ContactNotification($contact));
        } catch (\Exception $e) {
            Log::error('Failed to send contact notification: ' . $e->getMessage());
        }
    }

    public function sendBookingReminder(Booking $booking): void
    {
        try {
            Mail::to($booking->user->email)
                ->send(new \App\Mail\BookingReminder($booking));
        } catch (\Exception $e) {
            Log::error('Failed to send booking reminder: ' . $e->getMessage());
        }
    }
}
