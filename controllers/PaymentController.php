<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Order;
use app\models\Payment;

class PaymentController extends Controller
{
    public function checkout(Request $request, Response $response)
    {
        $order = new Order();
        $payment = new Payment();

        if ($request->isPost()) {
            $payment->loadData($request->getBody());
            $order->loadData($request->getBody());
            if ($payment->validate() && $payment->save()) {
                $order->payment_id = $payment->getPaymentId();
                if ($order->save()) {
                    Application::$app->session->setFlash('payment', 'Thanks for subscribing!');
                    $response->redirect('/paymentconfirm');
                    exit();
                }
            } else {
                Application::$app->session->setFlash('nopayment', 'PaymentForm unsuccessful = please try again');
                $response->redirect('/checkout');
            }
        }
        $allProducts = Order::getAll(Order::class);
        $this->setLayout('auth');
        return $this->render('checkout');
    }

    public function paymentconfirm()
    {
        $this->setLayout('auth');
        return $this->render('paymentconfirm');
    }

}