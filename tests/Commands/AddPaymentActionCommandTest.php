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

    /** @test */
    public function add_payment_action_command_should_add_an_entry_in_config()
    {
        $name = 'some_payment_action';
        $class = 'SomePaymentAction';
        $this->artisan("payment:add-action", ['--name' => $name, '--class' => $class])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $actionsNamespace = $paymentConfig['actions_namespace'];
        $this->assertArrayHasKey($name, $paymentConfig['actions']);
        $this->assertEquals($actionsNamespace . "\\" . $class, $paymentConfig['actions'][$name]);
    }

    /** @test */
    public function add_payment_action_command_should_scaffold_a_class_in_actions_directory()
    {
        $name = 'some_payment_action';
        $class = 'SomePaymentAction';
        $this->artisan("payment:add-action", ['--name' => $name, '--class' => $class])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $this->assertFileExists(base_path($paymentConfig['actions_directory'] . '/' . $class . '.php'));
    }
}
