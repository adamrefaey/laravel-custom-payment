<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests\Commands;

use MustafaRefaey\LaravelCustomPayment\Tests\TestCase;
use ReflectionClass;

class AddPaymentHandlerCommandTest extends TestCase
{
    /** @test */
    public function add_payment_handler_command_exists()
    {
        $this->artisan("payment:add-handler")->assertExitCode(0);
    }

    /** @test */
    public function add_payment_handler_command_should_add_an_entry_in_config()
    {
        $name = 'some_payment_handler';
        $class = 'SomePaymentHandler';
        $this->artisan("payment:add-handler", ['--name' => $name, '--class' => $class])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $handlersNamespace = $paymentConfig['handlers_namespace'];
        $this->assertArrayHasKey($name, $paymentConfig['handlers']);
        $this->assertEquals($handlersNamespace . "\\" . $class, $paymentConfig['handlers'][$name]);
    }

    /** @test */
    public function add_payment_handler_command_should_scaffold_a_class_in_handlers_directory()
    {
        $name = 'some_payment_handler';
        $class = 'SomePaymentHandler';
        $this->artisan("payment:add-handler", ['--name' => $name, '--class' => $class])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $this->assertFileExists(base_path($paymentConfig['handlers_directory'] . '/' . $class . '.php'));
    }

    /** @test */
    public function add_payment_handler_command_should_scaffold_a_class_implements_handlers_interface()
    {
        $name = 'some_payment_handler';
        $class = 'SomePaymentHandler';
        $this->artisan("payment:add-handler", ['--name' => $name, '--class' => $class])->assertExitCode(0);

        $paymentConfig = require config_path('laravel-custom-payment.php');
        $handlerClassPath = base_path($paymentConfig['handlers_directory'] . '/' . $class . '.php');
        $this->assertFileExists($handlerClassPath);

        require $handlerClassPath;
        $fullClass = '\\' . $paymentConfig['handlers_namespace'] . '\\' . $class;
        $handlerReflection = new ReflectionClass($fullClass);

        $this->assertTrue($handlerReflection->implementsInterface('MustafaRefaey\\LaravelCustomPayment\\PaymentHandler'));
    }
}
