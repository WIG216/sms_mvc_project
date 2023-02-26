<?php

class App
{
   
    //they are private because everything happens within this folder
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", $URL);
        return $URL;
    }


    public function loadController()
    {
        $URL = $this->splitURL();
        $filename = "../app/controllers/" . ucfirst($URL[0]) . "Controller.php";

        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
        }
    }
}

    // loadController();