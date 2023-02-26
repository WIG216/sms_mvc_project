<?php

// HomeController inherits the controller class
class HomeController extends Controller
{
    public function index()
    {
        // echo "This is the home controller";
        $model = new Admin;

        // ['id'] => 1 == array[id] = 1
        // $array['admin_id'] = 1;
        // $array['id'] = 4;
        $array['name'] = "test";
        $result = $model->findAll();

        show($result);

        // $this->view('home');
    }
}
