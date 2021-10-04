<?php 
namespace App\Controllers;

use App\Models\NewsM;
use App\Core\Controller;
use App\Models\Category;

class News extends Controller {
    public function __construct()
    {
        $this->newsModel = $this->loadmodel('NewsM');
    }
    function index(){
  
        $model = new NewsM;
        $data = $model->getCategoryFromNews();
        
        // $data = $model->fetchAllNews();
       

        
        
        $this->view("news/index", $data);
    }
   



    public function createNews() {
        
        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/admins");
        }
        $model = new NewsM;
        $result = $model->getCategory();
        
        
        $data = [
            'title' => '',
            'content' => '',
            'img_url' => '',
            'category_id' => '',
            'titleError' => '',
            'bodyError' => '',
            'categories' => $result
            
            
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'admin_id' => $_SESSION['admin_id'],
               
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'img_url' => trim($_POST['img_url']),
                'category_id' => trim($_POST['category_id']),
                'titleError' => '',
                'bodyError' => ''
            ];

           

            if(empty($data['title'])) {
                $data['titleError'] = 'The body of a post cannot be empty';
            }
           
            

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($model->addNews($data)) {
                    header("Location: " . URLROOT . "/admins");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('news/createNews', $data);
            }
        }
        
        $this->view('news/createNews', $data);
}
public function updateNews($id) {
    $model = new NewsM;
    $result = $model->getCategory();
    

    $post = $model->findNewsById($id);

    


    if(!isLoggedIn()) {
        header("Location: " . URLROOT . "/news");
    } 

    $data = [
        'post' => $post,
        'title' => '',
        'content' => '',
        'img_url' => '',
        'category_id' => '',
        'titleError' => '',
        'bodyError' => '',
        'categories' => $result,

        
    ];
     
    // var_dump($data);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'title' => trim($_POST['title']),
            'content' => trim($_POST['content']),
            'img_url' => trim($_POST['img_url']),
            'category_id' => trim($_POST['category_id']),
            'titleError' => '',
            'bodyError' => ''
        ];
        // var_dump($_POST);
        if(empty($data['title'])) {
            $data['titleError'] = 'The title of a post cannot be empty';
        }
       

       

      
        

        if (empty($data['titleError']) && empty($data['bodyError'])) {
            if ($model->updatePost($data)) {
                header("Location: " . URLROOT . "/news");
               
            } else {
                die("Something went wrong, please try again!");
            }
        } else {
            $this->view('news/updateNews', $data);
        }
    }

    $this->view('news/updateNews', $data);
}


    public function deleteNews($id) {
        $model = new NewsM;
        $post = $model->findNewsById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/news");
        } 

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($model->deletePost($id)) {
                    header("Location: " . URLROOT . "/news");
            } else {
            die('Something went wrong!');
            }
        }
    }
    public function single($id) {
        $model = new NewsM;
        $data = $model->getNameCategoryFromNews($id);


       
       
        $this->view('news/single', $data);
       
    }



    public function searchNews(){
        $model = new NewsM;
        
        $data = '';
      
        
        

        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = trim($_POST['search']);
           
            
           
            if ($model->searchNews($data)) {
                $data = $model->searchNews($data);
                $this->view("news/searchNews", $data);
                    
               
                header("Location: " . URLROOT . "/news/searchNews");
               
              
    }

        }
        
    }
}

?>