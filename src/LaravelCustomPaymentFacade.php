<?php

namespace MustafaRefaey\LaravelCustomPayment;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MustafaRefaey\LaravelCustomPayment\LaravelCustomPayment
 */
class LaravelCustomPaymentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-custom-payment';
    }
}
