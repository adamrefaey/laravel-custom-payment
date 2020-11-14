<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class LaravelCustomPaymentCommand extends Command
{
    public $signature = 'laravel-custom-payment';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
