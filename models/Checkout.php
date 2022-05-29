<?php

namespace app\models;

use app\core\CheckoutModel;

class Checkout extends CheckoutModel
{
    public int $order_id = 0;
    public int $user_id = 0;
    public int $payment_id = 0;
    public int $product_id = 0;

    public function tableName(): string
    {
        return 'orders';
    }

    public function attributes(): array
    {
        return ['order_id', 'user_id', 'payment_id', 'product_id'];
    }

    public function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
    }

    public function rules(): array
    {

        // TODO: Implement rules() method.
    }
}