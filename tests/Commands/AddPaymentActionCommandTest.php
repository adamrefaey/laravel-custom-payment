<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests\Commands;

use MustafaRefaey\LaravelCustomPayment\Tests\TestCase;
use ReflectionClass;

class AddPaymentActionCommandTest extends TestCase
{
    /** @test */
    public function add_payment_action_command_exists()
    {
        $this->artisan("payment:add-action")->assertExitCode(0);
    }
}
