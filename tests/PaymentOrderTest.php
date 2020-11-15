<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests;

use MustafaRefaey\LaravelCustomPayment\PaymentOrder;

class PaymentOrderTest extends TestCase
{
    /** @test */
    public function order_can_be_created()
    {
        $paymentHandler = "some_payment_handler";
        $paymentAction = "some_payment_action";
        $payload = [];
        $order = PaymentOrder::create($paymentHandler, $paymentAction, $payload);
        $this->assertInstanceOf(PaymentOrder::class, $order);
    }
}
