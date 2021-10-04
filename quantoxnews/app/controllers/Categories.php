<?php
namespace App\Controllers;

use App\Models\Category;
use App\Core\Controller;


class Categories extends Controller {

    public function __construct()
    {
        $this->newsModel = $this->loadmodel('Category');
    }
    function index(){
       
        $model = new Category;
        $data = $model->fetchAllCategory();
        $this->view("categories/index", $data);
    }

    public function createCategory() {
        $model = new Category;

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/admins");
        }

        $data = [
            
            'name_category' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'admin_id' => $_SESSION['admin_id'],
               
                'name_category' => trim($_POST['name_category']),
                'titleError' => '',
                'bodyError' => ''
            ];

           

            if(empty($data['name_category'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($model->addCategory($data)) {
                    header("Location: " . URLROOT . "/admins");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('categories/createCategory', $data);
            }
        }

        $this->view('categories/createCategory', $data);
    }
    public function updateCategory($id) {
        $model = new Category;
        $post = $model->findCategoryById($id);
        //var_dump($result);
    
    
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/news");
        } 
    
        $data = [
            'post' => $post,
            'name_category' => '',
            'titleError' => '',
            'bodyError' => ''
            
            
        ];
         
        // var_dump($data);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'id' => $id,
                'name_category' => trim($_POST['name_category']),
                'titleError' => '',
                'bodyError' => ''
            ];
            // var_dump($_POST);
            if(empty($data['name_category'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }
           
    
           
    
          
            
    
            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($model->updateCategory($data)) {
                    header("Location: " . URLROOT . "/categories");
                    var_dump($data);
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('categories/updateCategory', $data);
            }
        }
    
        $this->view('categories/updateCategory', $data);
    }
    
    
        public function deleteCategory($id) {
            $model = new Category;
            $post = $model->findCategoryById($id);
    
            if(!isLoggedIn()) {
                header("Location: " . URLROOT . "/news");
            } 
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                if($model->deleteCategory($id)) {
                        header("Location: " . URLROOT . "/categories");
                } else {
                die('Something went wrong!');
                }
            }
        }
        public function single($id) {
            $model = new Category;
            $result = $model->findCategoryById($id);
            $cat = $model->getNewsFromCategory($id);
            $data = [
                'post' => $cat,
                'categories' => $result
            ];
    
            
           
           
            $this->view('categories/single', $data);
           
        }
    
}