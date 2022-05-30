<?php

namespace app\controllers;

use app\models\Order;
use app\models\Payment;

class ProfileController extends Controller
{
    public function profile()
    {
        $order = new Order();
        $payment = new Payment();
        return $this->render('profile');
    }
}