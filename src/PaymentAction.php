<?php

namespace MustafaRefaey\LaravelCustomPayment;

use Exception;

abstract class PaymentAction
{
    public $payload;

    /**
     * @param array $actionPayload The action payload
     */
    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    /**
     * @return bool If the user authorized to pay for this action
     */
    abstract public function authorize(): bool;

    /**
     * @return int The amount needed to pay for this action
     */
    abstract public function getAmount(): int;

    /**
     * This method is executed, once the payment order is verified
     *
     * @param PaymentOrder $paymentOrder The payment order of this action
     * @throws Exception This method must throw an exception if executing the action failed
     */
    abstract public function exec(PaymentOrder $paymentOrder);
}
