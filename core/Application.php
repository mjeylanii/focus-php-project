<?php

namespace app\core;

use app\controllers\Controller;
use app\models\Product;

class Application
{
    /*
     * These are typed properties
     * They will be accessible throughout the application
     * */
    public static string $ROOT_DIR;
    public string $userClass;
    public string $productClass;
    public Request $request;
    public Router $router;
    public Response $response;
    public static Application $app;
    public Controller $controller;
    public Session $session;
    public Database $db;
    public ?DbModel $user = null;


    /*
     * 1:
     * In the Application we first create a constructor to create an instance of the router*/
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        $this->productClass = $config['productClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        /*Here we declare the request and response class instances*/
        $this->request = new Request();
        $this->response = new Response();
        /*After declaring the request and response instances we can pass them into the router, so we can use
        them in the router*/
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = (new $this->userClass)->primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId], $this->userClass);
        }
        else{
            $this->user= null;
        }

    }

    public function run()
    {
        /*
         * The run method in the end echos the requested data here (HTML) in this case and is rendered to the user*/
        echo $this->router->resolve();
        /*The resolve method is the Router class and is accessible by the Application because of the router instance
         created at the top*/
    }


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);/*Here the 'user' argument refers to the SESSION key name that stores the user_id*/
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(): bool|DbModel
    {
        return self::$app->user ?? false;
    }

}