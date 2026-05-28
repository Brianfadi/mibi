<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Models\User;
use App\Services\Notification\NotificationService;

class PaymentService
{
    public function __construct(
        private MpesaService $mpesaService,
        private StripeService $stripeService,
        private NotificationService $notificationService
    ) {}

    public function processPayment(array $data): Payment
    {
        $payment = Payment::create([
            'booking_id' => $data['booking_id'] ?? null,
            'user_id' => $data['user_id'],
            'payable_id' => $data['payable_id'],
            'payable_type' => $data['payable_type'],
            'amount' => $data['amount'],
            'currency' => $data['currency'] ?? 'KES',
            'payment_method' => $data['payment_method'],
            'status' => 'pending',
            'metadata' => $data['metadata'] ?? null,
        ]);

        return match ($data['payment_method']) {
            'mpesa' => $this->processMpesaPayment($payment, $data),
            'stripe' => $this->processStripePayment($payment, $data),
            'paypal' => $this->processPayPalPayment($payment, $data),
            'bank_transfer' => $this->processBankTransfer($payment),
            default => throw new \InvalidArgumentException('Unsupported payment method'),
        };
    }

    private function processMpesaPayment(Payment $payment, array $data): Payment
    {
        $response = $this->mpesaService->stkPush(
            $data['phone_number'],
            $payment->amount,
            $payment->id
        );

        $payment->update([
            'payment_reference' => $response['CheckoutRequestID'] ?? null,
            'metadata' => array_merge($payment->metadata ?? [], ['mpesa_response' => $response]),
        ]);

        return $payment;
    }

    private function processStripePayment(Payment $payment, array $data): Payment
    {
        $charge = $this->stripeService->createCharge(
            $data['stripe_token'],
            $payment->amount,
            $payment->currency
        );

        $payment->update([
            'transaction_id' => $charge->id,
            'status' => 'completed',
            'paid_at' => now(),
        ]);

        $this->notificationService->sendPaymentConfirmation($payment);

        return $payment;
    }

    private function processPayPalPayment(Payment $payment, array $data): Payment
    {
        $payment->update([
            'payment_reference' => $data['paypal_order_id'] ?? null,
            'metadata' => array_merge($payment->metadata ?? [], ['paypal_response' => $data]),
        ]);

        return $payment;
    }

    private function processBankTransfer(Payment $payment): Payment
    {
        $payment->update([
            'payment_reference' => 'BANK-' . strtoupper(uniqid()),
        ]);

        return $payment;
    }

    public function confirmPayment(string $paymentReference, ?string $transactionId = null): Payment
    {
        $payment = Payment::where('payment_reference', $paymentReference)->firstOrFail();

        $payment->update([
            'status' => 'completed',
            'transaction_id' => $transactionId,
            'paid_at' => now(),
        ]);

        if ($payment->booking) {
            app(BookingService::class)->confirmBooking($payment->booking);
        }

        $this->notificationService->sendPaymentConfirmation($payment);

        return $payment;
    }

    public function failPayment(string $paymentReference): Payment
    {
        $payment = Payment::where('payment_reference', $paymentReference)->firstOrFail();
        $payment->update(['status' => 'failed']);

        return $payment;
    }

    public function refundPayment(Payment $payment): Payment
    {
        if ($payment->payment_method === 'stripe' && $payment->transaction_id) {
            $this->stripeService->refundCharge($payment->transaction_id);
        }

        $payment->update(['status' => 'refunded']);

        return $payment;
    }

    public function getUserPaymentHistory(int $userId)
    {
        return Payment::with(['payable', 'booking'])
            ->where('user_id', $userId)
            ->latest()
            ->paginate(15);
    }
}
