<?php

namespace app\core;
class Router
{
    /*To actually be able to use the request and response instances we need to declare them as properties
    in the Router
    !! To be able to use the properties efficiently use the constructor !!!
    */
    public Request $request;
    public Response $response;
    /*
     * In the $routes we are storing the path and the callback that is sent to either the get() and post() methods */
    protected array $routes = [];
    /*
     * The $routes array might be nested if both post and get methods are called
     * so it might look like this
     * $routes = [ 'get' => [ '/' => callback '/contact]
     *'post' => [ '/' => callback,'/contact' ]]
     * */

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        /*The get method is used to render the code for views*/
        /*Here the data sent from the Index.php is stored in the $routes array variable*/
        $this->routes['get'][$path] = $callback;

        /*!!!!! $callback is the method we want !!!!!*/
    }

    public function post($path, $callback)
    {
        /*The post method is for handling the submitted data*/
        /*Here the data sent from the Index.php is stored in the $routes array variable*/
        $this->routes['post'][$path] = $callback;
    }


    public function resolve()
    {
        /*Here we determine the current path (the current URL) and the current method
        $path variable is to get the url/path
        $method is to get the current method
        */
        $path = $this->request->getPath();
          /*Using the request instance to access the getPath method
           in the Request class*/
        $method = $this->request->method();
        /*Using the request instance to access the getPath method
         in the Request class*/
        $callback = $this->routes[$method][$path] ?? false;
        /*In the $callback we store the method and the path
        And we check if the router instance actually passed the URL entered, to the resolver
        */
        if ($callback === false) {
            $this->response->setStatusCode(404);
            header("location: _404");
            return 'Not found';
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
            /*This is returned to the Application class run method which is then echoed by it.*/
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        /*Here we have call_user_func which takes a parameter the array $callback in this case and calls the function
        found in the  second index.
        */
        return call_user_func($callback, $this->request, $this->response);
        /*Returns it to the $app->run that called this resolve() method and is echoed*/
    }

    public function renderView($view, $params = [], $json = null)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params, $json);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }


    protected function renderOnlyView($view, $params, $json)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}