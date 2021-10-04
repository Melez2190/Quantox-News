<?php 
 namespace App\Models;
 use App\Core\Database;

    class Admin {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        
        public function login($username, $password) {
            $this->db->query('SELECT * FROM admins WHERE name = :name');
    
            
            $this->db->bind(':name', $username);
    
            $row = $this->db->single();
    
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
        public function addCategory($data) {
            
            $this->db->query('INSERT INTO category (name_category, created_at) VALUES (:name_category, NOW() )');
    
           
            
            $this->db->bind(':name_category', $data['name_category']);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function addNews($data) {
            
            $this->db->query('INSERT INTO news (title, content, img_url, category_id, created_at, updated_at) VALUES (:title, :content, :img_url, :category_id, NOW(), NOW() )');
    
           
            
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':img_url', $data['img_url']);
            $this->db->bind(':category_id', $data['category_id']);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        
        
        

        

        }
      
    public function getCategory(){
        $data = $this->db->query("SELECT * FROM category");
        
        $results = $this->db->resultSet();

        return $results;
    }
      
    }
   
?>