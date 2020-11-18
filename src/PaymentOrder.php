<?php

namespace MustafaRefaey\LaravelCustomPayment;

class PaymentOrder
{
    public static function create(string $paymentHandlerName, PaymentAction $paymentAction): self
    {
        $paymentAction->authorize();

        return new self;
    }
}
