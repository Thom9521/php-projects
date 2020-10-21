<?php
class Home extends Controller {
    public function index($name, $age){
       // echo "<br/>name: $name <br/>";
       // echo "phone: $phone";

        $user = $this->model('User');

        $user->name = $name;

        $this->view('home/index', ['name'=>$name, 'age'=>$age]);
    }
}