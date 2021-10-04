<?php 
namespace App\Controllers;

use App\Models\NewsM;
use App\Core\Controller;
use App\Models\Subscriber;

class Subscriptions extends Controller {
    public function __construct()
    {
        
            $this->subModel = $this->loadmodel('Subscriber');
        
    }
    public function index(){
        $model = new Subscriber;
        $data = $model->getSubsrciber();
    
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/home/index");
        }
        $this->view('subscriptions/index', $data);
        }
    
    public function subscribeNews(){
        $model = new Subscriber;

        // $data = $model->findNewsById($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_email' => $_POST['user_email'],
                'news_id' => $_POST['news_id'],
                'titleError' => '',
                'bodyError' => ''
                
              
            ];
            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($model->addNewsSubsriber($data)) {
                    header("Location: " . URLROOT . "/news/index");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('news/createNews', $data);
            }
    }
}
    public function subscribeCategory(){
        $model = new Subscriber;

      

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_email' => $_POST['user_email'],
                'category_id' => $_POST['category_id'],
                'titleError' => '',
                'bodyError' => ''
                
              
            ];
            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($model->addCategorySubsriber($data)) {
                    header("Location: " . URLROOT . "/categories/index");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('categories/index', $data);
            }
    }

}

    public function autoMail($id) {
        $model = new Subscriber;
        $data = $model->getAllSub();
        
        
      

    }

}