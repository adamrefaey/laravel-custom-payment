<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class AddPaymentActionCommand extends Command
{
    public $signature = 'payment:add-action {--name= : Action\'s name} {--class= : Action\'s class} ';

    public $description = 'Add payment action and scaffold its class';

    public function handle()
    {
        $name = $this->option('name');
        $class = $this->option('class');

        // add entry to config
        $paymentConfig = require config_path('laravel-custom-payment.php');
        $paymentConfig['actions'][$name] = $paymentConfig['actions_namespace'] . "\\" . $class;
        file_put_contents(config_path('laravel-custom-payment.php'), '<?php return ' . var_export($paymentConfig, true) . ';');

        // scaffold class from stub into actions directory
        $actionStub = file_get_contents(__DIR__ . '/../../resources/stubs/payment-action.stub');
        $actionStub = str_replace('{{ namespace }}', $paymentConfig['actions_namespace'], $actionStub);
        $actionStub = str_replace('{{ class }}', $class, $actionStub);

        if (! is_dir(base_path($paymentConfig['actions_directory']))) {
            mkdir(base_path($paymentConfig['actions_directory']), 0777, true);
        }

        file_put_contents(base_path($paymentConfig['actions_directory'] . '/' . $class . '.php'), $actionStub);
    }
}
