<?php

namespace MustafaRefaey\LaravelCustomPayment\Commands;

use Illuminate\Console\Command;

class AddPaymentActionCommand extends Command
{
    public $signature = 'payment:add-action {--name= : Action\'s name} {--class= : Action\'s class} ';

    public $description = 'Add payment action and scaffold its class';

    public function handle()
    {
    }
}
