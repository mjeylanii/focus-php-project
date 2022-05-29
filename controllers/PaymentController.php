<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Checkout;

class PaymentController extends Controller
{
    public function checkout(Request $request, Response $response)
    {
        $checkout = new Checkout();
        if ($request->isPost()) {
            $checkout->loadData($request->getBody());
            if ($checkout->validate() && $checkout->save()) {
                Application::$app->session->setFlash('payment', 'Thanks for subscribing!');
                $response->redirect('/paymentconfirm');
                exit();
            } else {
                Application::$app->session->setFlash('nopayment', 'Payment unsuccessful = please try again');
                $response->redirect('/checkout');
            }
        }
        $allProducts = Checkout::getAll(Checkout::class);
        $this->setLayout('auth');
        return $this->render('checkout');
    }

    public function paymentconfirm()
    {
        $this->setLayout('auth');
        return $this->render('paymentconfirm');
    }

}