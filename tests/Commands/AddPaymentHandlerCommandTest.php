<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests\Commands;

use MustafaRefaey\LaravelCustomPayment\PaymentOrder;
use MustafaRefaey\LaravelCustomPayment\Tests\TestCase;

class AddPaymentHandlerCommandTest extends TestCase
{
    /** @test */
    public function add_payment_handler_command_exists()
    {
        $this->artisan("payment:add-handler")->assertExitCode(0);
    }
}
