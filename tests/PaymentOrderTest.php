<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests;

use MustafaRefaey\LaravelCustomPayment\PaymentOrder;

class PaymentOrderTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $handlerName = 'some_payment_handler';
        $handlerClass = 'SomePaymentHandler';
        $this->artisan("payment:add-handler", ['--name' => $handlerName, '--class' => $handlerClass])->assertExitCode(0);

        $actionName = 'some_payment_action';
        $actionClass = 'SomePaymentAction';
        $this->artisan("payment:add-action", ['--name' => $actionName, '--class' => $actionClass])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');

        $handlerClassPath = base_path($paymentConfig['handlers_directory'] . '/' . $handlerClass . '.php');
        require_once $handlerClassPath;

        $actionClassPath = base_path($paymentConfig['actions_directory'] . '/' . $actionClass . '.php');
        require_once $actionClassPath;
    }

    /** @test */
    public function order_can_be_created()
    {
        $paymentHandlerName = "some_payment_handler";
        $paymentActionName = "some_payment_action";
        $payload = [];

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $actionClass = $paymentConfig['actions'][$paymentActionName];

        $action = new $actionClass($payload);
        $order = PaymentOrder::create($paymentHandlerName, $action);
        $this->assertInstanceOf(PaymentOrder::class, $order);
    }
}
