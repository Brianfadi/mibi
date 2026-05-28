<?php

return [

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // M-Pesa Configuration
    'mpesa' => [
        'consumer_key' => env('MPESA_CONSUMER_KEY'),
        'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
        'passkey' => env('MPESA_PASSKEY'),
        'shortcode' => env('MPESA_SHORTCODE', '174379'),
        'callback_url' => env('MPESA_CALLBACK_URL', 'https://mibi.africa/api/mpesa/callback'),
        'live' => env('MPESA_LIVE', false),
    ],

    // Stripe Configuration
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret_key' => env('STRIPE_SECRET'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],

    // WhatsApp Business API Configuration
    'whatsapp' => [
        'api_url' => env('WHATSAPP_API_URL', 'https://graph.facebook.com/v17.0'),
        'token' => env('WHATSAPP_TOKEN'),
        'phone_number_id' => env('WHATSAPP_PHONE_NUMBER_ID'),
        'business_phone' => env('WHATSAPP_BUSINESS_PHONE'),
        'verify_token' => env('WHATSAPP_VERIFY_TOKEN', 'mibi_webhook_2024'),
        'number' => env('WHATSAPP_NUMBER', '254700000000'),
    ],

];
