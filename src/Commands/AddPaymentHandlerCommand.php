<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class AddPaymentHandlerCommand extends Command
{
    public $signature = 'payment:add-handler {--name= : Handler\'s name} {--class= : Handler\'s class} ';

    public $description = 'Add payment handler and scaffold its class';

    public function handle()
    {
        $name = $this->option('name');
        $class = $this->option('class');

        // add entry to config
        $paymentConfig = require config_path('laravel-custom-payment.php');
        $paymentConfig['handlers'][$name] = config('core-config.handlers_namespace') . "\\" . $class;
        file_put_contents(config_path('laravel-custom-payment.php'), '<?php return ' . var_export($paymentConfig, true) . ';');

        // scaffold class from stub into handlers directory
        $handlerStub = file_get_contents(__DIR__ . '/../../resources/stubs/payment-handler.stub');
        $handlerStub = str_replace('{{ namespace }}', config('core-config.handlers_namespace'), $handlerStub);
        $handlerStub = str_replace('{{ class }}', $class, $handlerStub);

        if (! is_dir(base_path(config('core-config.handlers_directory')))) {
            mkdir(base_path(config('core-config.handlers_directory')), 0777, true);
        }

        file_put_contents(base_path(config('core-config.handlers_directory') . '/' . $class . '.php'), $handlerStub);
    }
}
