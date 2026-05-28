<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use App\Services\Notification\NotificationService;
use Illuminate\Support\Collection;

class BookingService
{
    public function __construct(
        private NotificationService $notificationService
    ) {}

    public function createBooking(array $data): Booking
    {
        $booking = Booking::create([
            'user_id' => $data['user_id'],
            'service_id' => $data['service_id'] ?? null,
            'coach_id' => $data['coach_id'] ?? $this->getAvailableCoach(),
            'scheduled_at' => $data['scheduled_at'],
            'end_at' => $data['end_at'] ?? null,
            'session_type' => $data['session_type'] ?? 'video',
            'status' => 'pending',
            'timezone' => $data['timezone'] ?? config('app.timezone'),
            'notes' => $data['notes'] ?? null,
            'meeting_link' => $data['meeting_link'] ?? null,
            'metadata' => $data['metadata'] ?? null,
        ]);

        $this->notificationService->sendBookingConfirmation($booking);

        return $booking;
    }

    public function confirmBooking(Booking $booking): Booking
    {
        $booking->update(['status' => 'confirmed']);

        if (!$booking->meeting_link) {
            $booking->update([
                'meeting_link' => $this->generateMeetingLink($booking),
            ]);
        }

        $this->notificationService->sendBookingConfirmed($booking);

        return $booking;
    }

    public function cancelBooking(Booking $booking, ?string $reason = null): Booking
    {
        $booking->update([
            'status' => 'cancelled',
            'cancellation_reason' => $reason,
        ]);

        $this->notificationService->sendBookingCancelled($booking);

        return $booking;
    }

    public function rescheduleBooking(Booking $booking, string $newDateTime, ?string $timezone = null): Booking
    {
        $booking->update([
            'scheduled_at' => $newDateTime,
            'timezone' => $timezone ?? $booking->timezone,
            'status' => 'pending',
        ]);

        $this->notificationService->sendBookingRescheduled($booking);

        return $booking;
    }

    public function completeBooking(Booking $booking): Booking
    {
        $booking->update(['status' => 'completed']);
        return $booking;
    }

    public function getAvailableCoaches(): Collection
    {
        return User::role('coach')->active()->get();
    }

    public function getAvailableSlots(int $serviceId, string $date): Collection
    {
        $service = Service::findOrFail($serviceId);
        $duration = $service->duration_minutes ?? 60;

        $existingBookings = Booking::where('service_id', $serviceId)
            ->whereDate('scheduled_at', $date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('scheduled_at')
            ->map(fn ($d) => $d->format('H:i'))
            ->toArray();

        $slots = [];
        $start = strtotime('08:00');
        $end = strtotime('18:00');

        while ($start + $duration * 60 <= $end) {
            $time = date('H:i', $start);
            if (!in_array($time, $existingBookings)) {
                $slots[] = $time;
            }
            $start += $duration * 60;
        }

        return collect($slots);
    }

    private function getAvailableCoach(): ?User
    {
        return User::role('coach')->active()->first();
    }

    private function generateMeetingLink(Booking $booking): string
    {
        return 'https://meet.mibi.africa/' . strtolower(str_replace(' ', '-', $booking->user->name . '-' . uniqid()));
    }

    public function getUpcomingBookings(int $userId): Collection
    {
        return Booking::with(['service', 'coach'])
            ->where('user_id', $userId)
            ->upcoming()
            ->orderBy('scheduled_at')
            ->get();
    }

    public function getBookingHistory(int $userId): Collection
    {
        return Booking::with(['service', 'coach'])
            ->where('user_id', $userId)
            ->whereIn('status', ['completed', 'cancelled'])
            ->latest('scheduled_at')
            ->get();
    }
}
