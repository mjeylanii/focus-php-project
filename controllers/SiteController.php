<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;

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

    public function contact(): array|bool|string
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request): array|bool|string
    {
        $body = $request->getBody();
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