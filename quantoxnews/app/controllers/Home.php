<?php 
namespace App\Controllers;

use App\Models\NewsM;
use App\Core\Controller;

class Home extends Controller {
    public function __construct() {
        $this->newsMModel = $this->loadmodel('NewsM');
    }

    function index(){
       
       
        $model = new NewsM;
        $data = $model->getCategoryFromNews();
       

        
        
        $this->view("home/index", $data);
    }
       

        

    
}

?>