<?php 
namespace App\Controllers;
use App\Core\Controller;
class Admins extends Controller {
    public function __construct()
    {
        
            $this->adminModel = $this->loadmodel('Admin');
        
    }
   
   function index(){
      
    if(!isLoggedIn()) {
        header("Location: " . URLROOT . "/home");
    }
       $data['page_title'] = "dashboard";
       $this->view("dashboard", $data);
   }

    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            
            if (empty($data['name'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->adminModel->login($data['name'], $data['password']);

                if ($loggedInUser) {
                    $this->createAdminSession($loggedInUser);
                 } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('login', $data);
                }
            }

        } else {
            $data = [
                'name' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('admins/login', $data);
    }
    public function createAdminSession($admin) {
        $_SESSION['admin_id'] = $admin->id;
        $_SESSION['name'] = $admin->name;
        $_SESSION['email'] = $admin->email;
        header('location:' . URLROOT . '/admins/dashboard');
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('Location:' . URLROOT . '/index');
    }
    
    
   




    
        
}

   

