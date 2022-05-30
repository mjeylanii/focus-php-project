<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;
use app\core\PaymentModel;

class Payment extends PaymentModel
{
    public int $user_id = 0;
    public int $payment_id = 0;
    public string $payment_type = '';
    public string $card_name = '';
    public string $card_country = '';
    public string $card_adress = '';
    public string $card_expiry = '';
    public int $card_cvv = 0;
    public string $card_num = '';


    public function save()
    {
        $this->user_id = Application::$app->session->get('user');
        $this->payment_id = random_int(9990000, 99999999);
        $this->card_num = password_hash($this->card_num, PASSWORD_BCRYPT);
        return parent::save();
    }


    public function getPaymentId(): int
    {
        return $this->payment_id;
    }


    public function tableName(): string
    {
        return 'payment_details';
    }

    public function primaryKey(): string
    {
        return 'payment_id';
    }

    public function rules(): array
    {
        return [
            'payment_type' => [self::RULE_REQUIRED],
            'card_num' => [self::RULE_REQUIRED],
            'card_cvv' => [self::RULE_REQUIRED],
            'card_country' => [self::RULE_REQUIRED],
            'card_adress' => [self::RULE_REQUIRED],

        ];
    }

    public function attributes(): array
    {
        return ['payment_id',
            'payment_type',
            'card_num',
            'card_cvv',
            'card_expiry',
            'card_country',
            'card_adress',
            'user_id'];
    }
}