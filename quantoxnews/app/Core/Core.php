<?php 
 namespace App\Core;

    class Core {
        protected $currentController = 'App\Controllers\Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->getUrl();
           
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                $this->currentController = "App\Controllers\\" . ucwords($url[0]);
                unset($url[0]);
            }
            require_once '../app/controllers/'. str_replace("App\Controllers\\", "", $this->currentController) . '.php';

            
            
            $this->currentController = new $this->currentController;

            if(isset($url[1])){
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            

            $this->params = array_values($url);
            
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
        
            
        
        public function getUrl() {
           $url =  isset($_GET['url']) ? $_GET['url'] : "index";

            return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
        }
        
    }