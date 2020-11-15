<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class AddPaymentHandlerCommand extends Command
{
    public $signature = 'payment:add-handler {--name= : Handler\'s name} {--class= : Handler\'s class} ';

    public $description = 'Add payment handler and scaffold its class';

    public function handle()
    {
        $paymentConfig = require config_path('laravel-custom-payment.php');
        $paymentConfig['handlers'][$this->option('name')] = $paymentConfig['handlers_namespace'] . "\\" . $this->option('class');
        file_put_contents(config_path('laravel-custom-payment.php'), '<?php return ' . var_export($paymentConfig, true) . ';');
    }
}
