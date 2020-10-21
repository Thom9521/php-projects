<?php

class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct(){
        $url = $this->parseUrl();
        print_r($url);
        if(file_exists('../app/controllers/'.$url[0].'.php')){
            $this->controller = $url[0];
            //echo $this->controller;
            unset($url[0]);
            require_once '../app/controllers/'.$this->controller.'.php';

            //$this->controller = new home
            $this->controller = new $this->controller;

            //now get the method name from the url
            if(isset($url[1])){
                // tries to find a method inside the controller class
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }else{
                    echo"Method $url[1] does no exists";
                }
            }
            // need the params from the url
            $this->params= $url ? array_values($url) : [];

            // calls a method of a class and parses the parameter to it
            call_user_func_array([$this->controller, $this->method], $this->params);

        }else{
            echo "Can not find the controller $url[0]";
        }
    }
    public function parseUrl(){
        if($_GET['url']){
            return explode("/",filter_var($_GET['url'], FILTER_SANITIZE_URL));
        }
    }
}