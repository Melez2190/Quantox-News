<?php 
namespace App\Controllers;

use App\Models\NewsM;
use App\Core\Controller;

class Pages extends Controller {
    public function __construct()
    {
        
            $this->newsMModel = $this->loadmodel('NewsM');
        
    }
    public function index() {
        
        
            $model = new NewsM;
            $data = $model->getCategoryFromNews();

            
            
          
            if(!isset($_SESSION['admin_id'])){
                $this->view('home/index', $data);

            }else{
                header("Location:admins/dashboard");

            }
        }
}
    
