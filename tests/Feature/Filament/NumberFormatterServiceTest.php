<?php

use App\Services\NumberFormatterService;

beforeEach(function () {
    $this->service = new NumberFormatterService;
});

it('formats amount to money string', function () {
    expect($this->service->formatToMoney(1500))->toBeString();
});

it('handles blank amount in formatToMoney', function () {
    expect($this->service->formatToMoney(null))->toBeString();
    expect($this->service->formatToMoney(''))->toBeString();
});

it('formats a float number', function () {
    expect($this->service->format(1234.5))->toBe('1.234,50');
    expect($this->service->format(0))->toBe('0,00');
});

it('converts money format to integer cents', function () {
    $result = $this->service->formatFromMoney(1500);
    expect($result)->toBeInt();
});

it('handles blank amount in formatFromMoney', function () {
    expect($this->service->formatFromMoney(null))->toBe(0);
    expect($this->service->formatFromMoney(''))->toBe(0);
});
