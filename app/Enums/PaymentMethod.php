<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case Mpesa = 'mpesa';
    case Stripe = 'stripe';
    case PayPal = 'paypal';
    case BankTransfer = 'bank_transfer';

    public function label(): string
    {
        return match ($this) {
            self::Mpesa => 'M-Pesa',
            self::Stripe => 'Stripe',
            self::PayPal => 'PayPal',
            self::BankTransfer => 'Bank Transfer',
        };
    }

    public function requiresRedirect(): bool
    {
        return match ($this) {
            self::Stripe, self::PayPal => true,
            self::Mpesa, self::BankTransfer => false,
        };
    }
}
