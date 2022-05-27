<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

class PaymentController extends Controller
{
    public function checkout()
    {
        return $this->render('checkout');
    }

}