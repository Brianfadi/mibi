<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Services\BookingService;
use App\Services\Payment\PaymentService;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    public function __construct(
        private BookingService $bookingService,
        private PaymentService $paymentService
    ) {}

    public function index(): JsonResponse
    {
        $bookings = auth()->user()->bookings()
            ->with(['service', 'coach'])
            ->latest()
            ->get();

        return response()->json($bookings);
    }

    public function store(StoreBookingRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $booking = $this->bookingService->createBooking($data);

        $payment = $this->paymentService->processPayment([
            'booking_id' => $booking->id,
            'user_id' => auth()->id(),
            'payable_id' => $booking->id,
            'payable_type' => get_class($booking),
            'amount' => $booking->service->price,
            'currency' => $booking->service->currency,
            'payment_method' => $request->payment_method,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json([
            'booking' => $booking->load('payment'),
            'message' => 'Booking created successfully',
        ], 201);
    }

    public function show(Booking $booking): JsonResponse
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json($booking->load(['service', 'coach', 'payment']));
    }

    public function cancel(Booking $booking): JsonResponse
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if (!$booking->canCancel()) {
            return response()->json(['message' => 'Cannot cancel this booking'], 400);
        }

        $this->bookingService->cancelBooking($booking, request('reason'));

        return response()->json(['message' => 'Booking cancelled']);
    }

    public function slots(int $serviceId, string $date): JsonResponse
    {
        $slots = $this->bookingService->getAvailableSlots($serviceId, $date);

        return response()->json($slots);
    }
}
