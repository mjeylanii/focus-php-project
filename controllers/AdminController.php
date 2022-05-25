<?php

namespace app\controllers;

class AdminController extends Controller
{
    public function admin()
    {
        $this->setLayout('admin');
        return $this->render('orders');
    }
}