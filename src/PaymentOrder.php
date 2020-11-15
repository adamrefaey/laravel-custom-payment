<?php

namespace MustafaRefaey\LaravelCustomPayment;

class PaymentOrder
{
    public static function create(string $paymentHandler, string $paymentAction, array $payload = []): self
    {
        return new self;
    }
}
