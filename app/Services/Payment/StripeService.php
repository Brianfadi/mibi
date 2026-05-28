<?php

namespace App\Services\Payment;

use Stripe\Charge;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));
    }

    public function createCharge(string $token, float $amount, string $currency = 'USD'): Charge
    {
        return Charge::create([
            'amount' => (int) ($amount * 100),
            'currency' => strtolower($currency),
            'source' => $token,
            'description' => 'MIBI Coaching Payment',
        ]);
    }

    public function createCheckoutSession(float $amount, string $currency, array $metadata = []): Session
    {
        return Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => strtolower($currency),
                    'product_data' => [
                        'name' => 'MIBI Coaching Service',
                    ],
                    'unit_amount' => (int) ($amount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
            'metadata' => $metadata,
        ]);
    }

    public function retrieveCheckoutSession(string $sessionId): Session
    {
        return Session::retrieve($sessionId);
    }

    public function refundCharge(string $chargeId): Refund
    {
        return Refund::create(['charge' => $chargeId]);
    }
}
