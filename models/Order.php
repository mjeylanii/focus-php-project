<?php

namespace app\models;

use app\core\Application;
use app\core\OrderModel;

class Order extends OrderModel
{
    public int $order_id = 0;
    public int $user_id = 0;
    public int $payment_id = 0;
    public int $product_id = 0;


    public function save()
    {


        $this->user_id = Application::$app->session->get('user');
        $this->order_id = random_int(99999, 123123353);
        return parent::save();
    }

    public function tableName(): string
    {
        return 'orders';
    }

    public function primaryKey(): string
    {
        return 'order_id';
    }

    public function attributes(): array
    {
        return ['order_id', 'user_id', 'payment_id', 'product_id'];
    }

    public function rules(): array
    {
        return [
            'order_id' => [self::RULE_REQUIRED],
            'payment_id' => [self::RULE_REQUIRED],
            'product_id' => [self::RULE_REQUIRED],
        ];

    }


}