<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\Message;

class SiteController extends Controller
{
    public function home(): array|bool|string
    {
        $params = [
            'name' => "PC MASTER"
        ];
        return $this->render('home');
    }

    public function services(): array|bool|string
    {
        return $this->render('services');
    }

    public function register(): array|bool|string
    {
        return $this->render('register');
    }

    public function contact(Request $request, Response $response)
    {
        $message = new Message();

        if ($request->isPost()) {
            $message->loadData($request->getBody());
            if ($message->validate() && $message->save()) {
                Application::$app->session->setFlash('sent', 'Successfully sent message - We will reply as soon as possible');
                $response->redirect('/services');
                exit();
            } else {
                Application::$app->session->setFlash('sendfail', 'Message was not sent please try again');
                $response->redirect('/services');
            }
        }
        return $this->render('contact');
    }


    public function checkout(): array|bool|string
    {
        return $this->render('checkout');
    }

    public function users(): array|bool|string
    {
        return $this->render('users');
    }

    public function notFound()
    {
        $this->setLayout('auth');
        return $this->render('_404');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}