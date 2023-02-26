<?php

// HomeController inherits the controller class
class HomeController extends Controller
{
    public function index()
    {
        echo "This is the home controller";
        $this->view('home');
    }
}
