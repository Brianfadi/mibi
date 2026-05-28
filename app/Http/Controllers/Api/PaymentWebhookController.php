<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Payment\MpesaService;
use App\Services\Payment\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    public function __construct(
        private MpesaService $mpesaService,
        private PaymentService $paymentService
    ) {}

    public function mpesaCallback(Request $request): JsonResponse
    {
        Log::info('M-Pesa Callback Received', $request->all());

        $result = $this->mpesaService->processCallback($request->all());

        if ($result['success']) {
            $this->paymentService->confirmPayment(
                $result['checkout_request_id'],
                $result['transaction_id']
            );

            return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Success']);
        }

        $this->paymentService->failPayment(
            $request->input('Body.stkCallback.CheckoutRequestID')
        );

        return response()->json(['ResultCode' => 1, 'ResultDesc' => 'Failed']);
    }

    public function stripeWebhook(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $this->paymentService->confirmPayment(
                $session->id,
                $session->payment_intent
            );
        }

        return response()->json(['status' => 'ok']);
    }

    public function whatsappWebhook(Request $request): JsonResponse
    {
        $verifyToken = config('services.whatsapp.verify_token');

        if ($request->isMethod('get')) {
            $mode = $request->query('hub_mode');
            $token = $request->query('hub_verify_token');
            $challenge = $request->query('hub_challenge');

            if ($mode === 'subscribe' && $token === $verifyToken) {
                return response($challenge, 200);
            }

            return response('Forbidden', 403);
        }

        $whatsappService = app(\App\Services\Notification\WhatsAppService::class);
        $whatsappService->processWebhook($request->all());

        return response()->json(['status' => 'ok']);
    }
}
