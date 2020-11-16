<?php

namespace MustafaRefaey\LaravelCustomPayment;

use Exception;

interface PaymentHandler
{
    /**
     * @param PaymentOrder $paymenOrder The payment order calling this method,
     *                          passes itself to it, in case you need it
     * @param array $payload extra data passed to this method, in case it needed any.
     * @throws Exception This method must throw an exception if creating the order failed.
     *
     * @return string This method must return the external ID of the order,
     *                      so the order can be verified later using it.
     */
    public static function createOrder(PaymentOrder $paymenOrder, array $payload = []): string;

    /**
     * @param string $externalId The external ID of the order.
     * @param array $payload extra data passed to this method, in case it needed any.
     *
     * @return bool This method must return true if the order is verified, or false if not.
     */
    public static function verifyOrder(string $externalId, array $payload = []): bool;
}
