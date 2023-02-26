<?php

class App
{
   private $controller = 'HomeController';
   private $method = 'index';
    //they are private because everything happens within this folder
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }


    public function loadController()
    {
        $URL = $this->splitURL();
        $filename = "../app/controllers/" . ucfirst($URL[0]) . "Controller.php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]). "Controller";
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], $URL);

    }
}

    // loadController();