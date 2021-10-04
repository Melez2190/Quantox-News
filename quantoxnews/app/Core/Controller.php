<?php 
 namespace App\Core;
class Controller {
    
    public function loadModel($model){
        require_once '../app/models/' . $model . '.php';
        $model = "App\Models\\" . $model;
        return new $model;
    }

    public function view($view, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else {
            die("View does not exist.");
        }
    }
}