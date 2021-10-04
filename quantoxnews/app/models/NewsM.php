<?php 
 namespace App\Models;
use App\Core\Database;
class NewsM {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCategory(){
        $data = $this->db->query("SELECT * FROM category");
        
        $results = $this->db->resultSet();

        return $results;
    }

    public function getCategoryFromNews() {
        $data = $this->db->query("SELECT news.id, news.title, news.content, news.img_url, news.created_at, category.name_category  FROM news INNER JOIN category ON (news.category_id = category.id) ORDER BY created_at DESC");

        $results = $this->db->resultSet();
        

        return $results;

    }
   

    public function getNameCategoryFromNews($id) {
        $data = $this->db->query("SELECT news.id, news.title, news.content, news.img_url, news.created_at, news.updated_at, category.name_category FROM news INNER JOIN category ON (news.category_id = category.id) WHERE news.id = $id");

        $results = $this->db->resultSet();
        
        return $results;

    }
    

    public function fetchAllNews(){
        $data = $this->db->query("SELECT * FROM news");
        
        $results = $this->db->resultSet();

        return $results;
    }

    public function addNews($data) {
            
        $this->db->query('INSERT INTO news (title, content, img_url, category_id, created_at) VALUES (:title, :content, :img_url, :category_id, NOW() )');

       
        
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

        public function findNewsById($id) {
            $this->db->query('SELECT * FROM news WHERE id = :id LIMIT 1' );
    
            $this->db->bind(':id', $id);
    
            $row = $this->db->single();
    
            return $row;
        }


        public function updatePost($data) {

            $this->db->query('UPDATE news SET title = :title, content = :content, img_url = :img_url, category_id = :category_id, updated_at  = NOW() WHERE id = :id');

           
           
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':img_url', $data['img_url']);
            $this->db->bind(':category_id', $data['category_id']);

            
            

            if ($this->db->execute()) {
                $this->db->query("SELECT user_email FROM subscriptions WHERE news_id =" . $data['id']);
                $users = $this->db->resultSet();

                
                
                foreach($users as $user){
                    autoEmail($user->user_email);
                }
                return true;

            } else {
                return false;
            }
        }

        public function deletePost($id) {
            $this->db->query('DELETE FROM news WHERE id = :id');
    
            $this->db->bind(':id', $id);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function searchNews($data){
           
            $this->db->query("SELECT * FROM news WHERE title LIKE '%" . $data . "%' OR  content LIKE '%" . $data . "%' "   );
            
            

            $result = $this->db->resultSet();
          
           
           
            return $result;
        

            
            

        }
        public function addNewsSubsriber($data){
           
            $this->db->query('INSERT INTO subscriptions (user_email, news_id, created_at) VALUES (:user_email, :news_id,  NOW() )');

            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':news_id', $data['news_id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        public function addCategorySubsriber($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            $this->db->query('INSERT INTO subscriptions (user_email, category_id, created_at) VALUES (:user_email, :category_id,  NOW() )');

            $this->db->bind(':user_email', $data['user_email']);
            $this->db->bind(':category_id', $data['category_id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


      
     
}

?>