<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\PictureUpload;
use app\models\Profile;
use app\models\User;

class AuthController extends Controller
{


    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/loggedin');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('register');
    }

    public function handleRegister(Request $request, Response $response)
    {
        $this->setLayout('auth');
        $errors = [];
        $user = new User();
        $image = new PictureUpload();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                $image->save();
                Application::$app->session->setFlash('success', 'Successfully registered - Please enter your details to login');
                $response->redirect('/register');
            } else {
                $response->redirect('/registered');
                Application::$app->session->setFlash('fail_register', $user->errors['user_email'][0]);
            }
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function registered()
    {
        $this->setLayout('auth');
        return $this->render('registered');
    }

    public function loggedIn()
    {
        $this->setLayout('auth');
        return $this->render('loggedin');

    }


    public function logout()
    {
        Application::$app->logout();
        $this->setLayout('auth');
        return $this->render('logout');
    }

}