<?php

namespace app\controllers;

use app\core\Application;

class Controller
{
    public string $layout = 'main';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view,  $params = [], $json = null,)
    {
        return Application::$app->router->renderView($view, $params, $json);
    }

    public function foo()
    {
        
    }
}