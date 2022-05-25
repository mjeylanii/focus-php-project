<?php

namespace app\core;

class Request
{
    /*We created a request class, so we don't interact directly with the super global*/
    /*Here we have a getPath method to get the path of the requested URL*/
    public function getPath()
    {
        /*The $_SERVER super global is used to get the REQUEST_URI which contains the path and if it's empty we set it
        to '/'*/
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        /*Because the URI might contain unwanted text we check if there is '?' in the text using strpos() method
        and store the position of the mark in $pasition variable.
        */
        $position = strpos($path, '?');
        /*Then we check if strpos returned false (No '?' mark found)*/
        if ($position === false) {
          return $path;//If false we return the $path as is
        }
        /*Else we return a substring of the $path using substr */
       return substr($path, 0, $position);
    }

    public function method(): string
    {
      return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }
    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];
        if($this->method() === 'get'){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        if($this->method() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}