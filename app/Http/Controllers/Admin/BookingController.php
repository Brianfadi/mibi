<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(
        private BookingService $bookingService
    ) {}

    public function index()
    {
        $bookings = Booking::with(['user', 'service', 'coach'])
            ->latest()
            ->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'service', 'coach', 'payment']);

        return view('admin.bookings.show', compact('booking'));
    }

    public function confirm(Booking $booking)
    {
        $this->bookingService->confirmBooking($booking);

        return back()->with('success', 'Booking confirmed.');
    }

    public function complete(Booking $booking)
    {
        $this->bookingService->completeBooking($booking);

        return back()->with('success', 'Booking marked as completed.');
    }

    public function cancel(Request $request, Booking $booking)
    {
        $this->bookingService->cancelBooking($booking, $request->reason);

        return back()->with('success', 'Booking cancelled.');
    }

    public function upcoming()
    {
        $bookings = Booking::with(['user', 'service', 'coach'])
            ->upcoming()
            ->orderBy('scheduled_at')
            ->get();

        return view('admin.bookings.upcoming', compact('bookings'));
    }
}
