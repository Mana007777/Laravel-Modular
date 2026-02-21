<?php

namespace Modules\Payment;

use Illuminate\Support\Str;
use NumberFormatter;
use InvalidArgumentException;

final class PayBuddy
{
    public function charge(string $token, int $amountInCents, string $statementDescription): array
    {
        $this->validateToken($token);

        if ($amountInCents <= 0) {
            throw new InvalidArgumentException('Amount must be greater than zero.');
        }

        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

        return [
            'id' => (string) Str::uuid(),
            'amount_in_cents' => $amountInCents,
            'localized_amount' => $formatter->formatCurrency($amountInCents / 100, 'USD'),
            'statement_description' => $statementDescription,
            'created_at' => now()->toDateTimeString(),
        ];
    }

    public static function make(): self
    {
        return new self();
    }

    private function validateToken(string $token): void
    {
        // simple fake token validation
        if (! Str::startsWith($token, 'tok_') || strlen($token) < 20) {
            throw new InvalidArgumentException('Invalid payment token.');
        }
    }
}