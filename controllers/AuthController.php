<?php

namespace app\controllers;

use app\core\Request;
use app\models\registerModel;

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
        if ($request->isPost()) {
            session_start();
            $_SESSION['user'] = 1;
            /*  echo '<pre>';
             var_dump($_SESSION['user']);
             echo '</pre>';*/
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
        $errors = [];
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->register()) {
                return 'Succesfuly registered';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
        /*     return $this->render('register', ['errors' => $errors]);*/
    }

    public function handleLogout(Request $request): array|bool|string
    {
        $body = NULL;
        return $this->render('loggedout');
    }

}