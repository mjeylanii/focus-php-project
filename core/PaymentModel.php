<?php

namespace app\core;

abstract class PaymentModel extends DbModel
{
    abstract public function getPaymentId(): int;

}