<?php

namespace app\controllers;

class AdminController extends Controller
{
    public function admin()
    {
        $this->setLayout('adminlayout');
        return $this->render('orders');
    }

}