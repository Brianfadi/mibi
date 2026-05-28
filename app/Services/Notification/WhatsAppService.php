<?php

namespace App\Services\Notification;

use App\Models\WhatsAppMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private string $apiUrl;
    private string $token;
    private string $phoneNumberId;

    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.api_url', 'https://graph.facebook.com/v17.0');
        $this->token = config('services.whatsapp.token') ?? '';
        $this->phoneNumberId = config('services.whatsapp.phone_number_id') ?? '';
    }

    public function sendMessage(string $to, string $message, ?string $messageType = 'text'): array
    {
        $response = Http::withToken($this->token)
            ->post("{$this->apiUrl}/{$this->phoneNumberId}/messages", [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $this->formatPhone($to),
                'type' => $messageType,
                $messageType => ['body' => $message],
            ]);

        $this->logMessage('outbound', $to, $message, $response->json());

        return $response->json();
    }

    public function sendTemplate(string $to, string $templateName, array $parameters = []): array
    {
        $components = [];
        if (!empty($parameters)) {
            $components[] = [
                'type' => 'body',
                'parameters' => array_map(fn ($p) => ['type' => 'text', 'text' => $p], $parameters),
            ];
        }

        $response = Http::withToken($this->token)
            ->post("{$this->apiUrl}/{$this->phoneNumberId}/messages", [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $this->formatPhone($to),
                'type' => 'template',
                'template' => [
                    'name' => $templateName,
                    'language' => ['code' => 'en_US'],
                    'components' => $components,
                ],
            ]);

        $this->logMessage('outbound', $to, "Template: {$templateName}", $response->json());

        return $response->json();
    }

    public function processWebhook(array $data): void
    {
        $entries = $data['entry'] ?? [];

        foreach ($entries as $entry) {
            $changes = $entry['changes'] ?? [];

            foreach ($changes as $change) {
                $messages = $change['value']['messages'] ?? [];

                foreach ($messages as $message) {
                    $from = $message['from'];
                    $text = $message['text']['body'] ?? '';
                    $type = $message['type'] ?? 'text';
                    $msgId = $message['id'] ?? null;

                    $this->logMessage('inbound', $from, $text, $message);

                    $this->handleInboundMessage($from, $text, $type, $msgId);
                }
            }
        }
    }

    private function handleInboundMessage(string $from, string $text, string $type, ?string $msgId): void
    {
        $lowerText = strtolower(trim($text));

        $autoReplies = [
            'hello' => 'Hi there! Welcome to MIBI — Where Love Faces Reality ❤️ How can we support you today?',
            'hi' => 'Hi there! Welcome to MIBI — Where Love Faces Reality ❤️ How can we support you today?',
            'book' => 'To book a session, please visit: ' . route('bookings.create') . ' or reply with your preferred date and time.',
            'price' => 'Our coaching sessions start from KES 2,500. Check our full pricing here: ' . route('services.index'),
            'services' => 'We offer relationship coaching, emotional support, dating guidance, and healing sessions. View all services: ' . route('services.index'),
            'contact' => 'You can reach us at hello@mibi.africa or call +254 700 000 000. We are here for you!',
        ];

        $reply = null;
        foreach ($autoReplies as $keyword => $response) {
            if (str_contains($lowerText, $keyword)) {
                $reply = $response;
                break;
            }
        }

        if ($reply) {
            $this->sendMessage($from, $reply);
        } else {
            $this->sendMessage(
                $from,
                "Thank you for reaching out to MIBI. A team member will respond shortly. For urgent matters, call +254 700 000 000."
            );
        }
    }

    private function formatPhone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($phone) === 9) {
            $phone = '254' . $phone;
        } elseif (strlen($phone) === 10 && str_starts_with($phone, '0')) {
            $phone = '254' . substr($phone, 1);
        }
        return $phone;
    }

    private function logMessage(string $direction, string $from, ?string $message, array $metadata): void
    {
        try {
            WhatsAppMessage::create([
                'from' => $from,
                'to' => $direction === 'outbound' ? $from : config('services.whatsapp.business_phone'),
                'message' => $message,
                'direction' => $direction,
                'status' => 'sent',
                'metadata' => $metadata,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to log WhatsApp message: ' . $e->getMessage());
        }
    }
}
