<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    private string $consumerKey;
    private string $consumerSecret;
    private string $passkey;
    private string $shortCode;
    private string $callbackUrl;
    private bool $isLive;

    public function __construct()
    {
        $this->consumerKey = config('services.mpesa.consumer_key') ?? '';
        $this->consumerSecret = config('services.mpesa.consumer_secret') ?? '';
        $this->passkey = config('services.mpesa.passkey') ?? '';
        $this->shortCode = config('services.mpesa.shortcode') ?? '';
        $this->callbackUrl = config('services.mpesa.callback_url') ?? '';
        $this->isLive = config('services.mpesa.live', false);
    }

    private function baseUrl(): string
    {
        return $this->isLive
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';
    }

    private function getAccessToken(): string
    {
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->get($this->baseUrl() . '/oauth/v1/generate?grant_type=client_credentials');

        return $response->json('access_token');
    }

    public function stkPush(string $phoneNumber, float $amount, int $paymentId): array
    {
        $phoneNumber = $this->formatPhoneNumber($phoneNumber);
        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $response = Http::withToken($this->getAccessToken())
            ->post($this->baseUrl() . '/mpesa/stkpush/v1/processrequest', [
                'BusinessShortCode' => $this->shortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => (int) $amount,
                'PartyA' => $phoneNumber,
                'PartyB' => $this->shortCode,
                'PhoneNumber' => $phoneNumber,
                'CallBackURL' => $this->callbackUrl,
                'AccountReference' => 'MIBI-' . $paymentId,
                'TransactionDesc' => 'MIBI Payment',
            ]);

        Log::info('M-Pesa STK Push Response', $response->json());

        return $response->json();
    }

    public function queryStatus(string $checkoutRequestId): array
    {
        $timestamp = date('YmdHis');
        $password = base64_encode($this->shortCode . $this->passkey . $timestamp);

        $response = Http::withToken($this->getAccessToken())
            ->post($this->baseUrl() . '/mpesa/stkpushquery/v1/query', [
                'BusinessShortCode' => $this->shortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'CheckoutRequestID' => $checkoutRequestId,
            ]);

        return $response->json();
    }

    public function processCallback(array $data): array
    {
        $body = $data['Body'] ?? [];
        $resultCode = $body['stkCallback']['ResultCode'] ?? 1;

        if ($resultCode === 0) {
            $metadata = $body['stkCallback']['CallbackMetadata']['Item'] ?? [];
            $parsed = [];
            foreach ($metadata as $item) {
                $parsed[$item['Name']] = $item['Value'] ?? null;
            }

            return [
                'success' => true,
                'transaction_id' => $parsed['MpesaReceiptNumber'] ?? null,
                'phone' => $parsed['PhoneNumber'] ?? null,
                'amount' => $parsed['Amount'] ?? null,
                'checkout_request_id' => $body['stkCallback']['CheckoutRequestID'] ?? null,
            ];
        }

        return [
            'success' => false,
            'result_code' => $resultCode,
            'result_desc' => $body['stkCallback']['ResultDesc'] ?? 'Unknown error',
        ];
    }

    private function formatPhoneNumber(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($phone) === 9) {
            $phone = '254' . $phone;
        } elseif (strlen($phone) === 10 && str_starts_with($phone, '0')) {
            $phone = '254' . substr($phone, 1);
        } elseif (strlen($phone) === 12 && str_starts_with($phone, '254')) {
            // Already formatted
        } elseif (strlen($phone) === 13 && str_starts_with($phone, '+254')) {
            $phone = substr($phone, 1);
        }

        return $phone;
    }
}
