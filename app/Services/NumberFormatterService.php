<?php

namespace App\Services;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use Illuminate\Support\Str;

class NumberFormatterService
{
    public function formatToMoney(mixed $amount, string $currency = 'EUR'): string
    {
        $amount = blank($amount) ? 0 : $amount;
        $money = new Money($amount, $this->getCurrencyFromString($currency));

        return $money->format();
    }

    protected function getCurrencyFromString(string $currency): Currency
    {
        return new Currency(Str::upper($currency));
    }

    public function format(float $number): string
    {
        return number_format($number, 2, ',', '.');
    }

    public function formatFromMoney(mixed $amount, string $currency = 'EUR'): int
    {
        $amount = blank($amount) ? 0 : $amount;
        $money = new Money($amount, $this->getCurrencyFromString($currency));

        return (int) ($money->getAmount() * 100);
    }
}
