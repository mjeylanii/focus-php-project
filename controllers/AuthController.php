<?php

namespace app\controllers;

use app\core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function handleLogin(Request $request)
    {
        $this->setLayout('auth');
        $body = $request->getBody();
        if($request->isPost()){

            echo "Handling your data";
        }
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('register');
    }

    public function handleRegister(Request $request)
    {
        $this->setLayout('auth');
        $body = $request->getBody();
        if($request->isPost()){
            echo "Handling registration";
        }
        return $this->render('register');
    }

    public function handleLogout(Request $request): array|bool|string
    {
        $body = NULL;
        return $this->render('loggedout');
    }

}