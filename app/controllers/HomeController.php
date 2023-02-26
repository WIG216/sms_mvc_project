<?php

// HomeController inherits the controller class
class HomeController extends Controller
{
    public function index()
    {
        // echo "This is the home controller";
        $model = new Model;

        // ['id'] => 1 == array[id] = 1
        // $array['admin_id'] = 1;
        // $array['id'] = 4;
        $array['name'] = "update";
        $result = $model->update(3, $array);

        show($result);

        // $this->view('home');
    }
}
