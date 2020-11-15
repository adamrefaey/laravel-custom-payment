<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class AddPaymentHandlerCommand extends Command
{
    public $signature = 'payment:add-handler {--name= : Handler\'s name} {--class= : Handler\'s class} ';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
