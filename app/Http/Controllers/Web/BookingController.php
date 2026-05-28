<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Service;
use App\Services\BookingService;
use App\Services\Payment\PaymentService;

class BookingController extends Controller
{
    public function __construct(
        private BookingService $bookingService,
        private PaymentService $paymentService
    ) {}

    public function create()
    {
        $services = Service::active()->orderBy('sort_order')->get();

        return view('bookings.create', compact('services'));
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = $this->bookingService->createBooking($request->validated());

        $payment = $this->paymentService->processPayment([
            'booking_id' => $booking->id,
            'user_id' => auth()->id(),
            'payable_id' => $booking->id,
            'payable_type' => get_class($booking),
            'amount' => $booking->service->price,
            'currency' => $booking->service->currency,
            'payment_method' => $request->payment_method,
            'phone_number' => $request->phone_number,
            'stripe_token' => $request->stripe_token,
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully!');
    }

    public function show(int $id)
    {
        $booking = auth()->user()->bookings()
            ->with(['service', 'coach', 'payment'])
            ->findOrFail($id);

        return view('bookings.show', compact('booking'));
    }

    public function index()
    {
        $upcomingBookings = $this->bookingService->getUpcomingBookings(auth()->id());
        $pastBookings = $this->bookingService->getBookingHistory(auth()->id());

        return view('bookings.index', compact('upcomingBookings', 'pastBookings'));
    }

    public function cancel(int $id)
    {
        $booking = auth()->user()->bookings()->findOrFail($id);

        if (!$booking->canCancel()) {
            return back()->with('error', 'This booking cannot be cancelled.');
        }

        $this->bookingService->cancelBooking($booking, request('reason'));

        return back()->with('success', 'Booking cancelled successfully.');
    }

    public function slots(int $serviceId, string $date)
    {
        $slots = $this->bookingService->getAvailableSlots($serviceId, $date);

        return response()->json($slots);
    }
}
