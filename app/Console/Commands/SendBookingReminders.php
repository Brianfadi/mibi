<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Services\Notification\NotificationService;
use Illuminate\Console\Command;

class SendBookingReminders extends Command
{
    protected $signature = 'app:send-booking-reminders';
    protected $description = 'Send reminders for upcoming bookings';

    public function handle(NotificationService $notificationService)
    {
        $upcomingBookings = Booking::with(['user', 'service'])
            ->confirmed()
            ->whereDate('scheduled_at', now()->addDay()->toDateString())
            ->get();

        $count = 0;
        foreach ($upcomingBookings as $booking) {
            $notificationService->sendBookingReminder($booking);
            $count++;
        }

        $this->info("Sent {$count} booking reminders.");
    }
}
