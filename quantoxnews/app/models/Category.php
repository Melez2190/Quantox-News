<?php 
 namespace App\Models;
 use App\Core\Database;

class Category {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function fetchAllCategory(){
        $data = $this->db->query("SELECT * FROM category");
        
        $results = $this->db->resultSet();

        return $results;
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
    public function findCategoryById($id) {
        $this->db->query('SELECT * FROM category WHERE id = :id LIMIT 1' );

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getNewsFromCategory($id) {
        $data = $this->db->query("SELECT category.id, category.name_category, category.created_at, news.id, news.title, news.content, news.img_url, news.created_at, news.updated_at  FROM category INNER JOIN news ON (news.category_id = category.id) WHERE category.id = $id ORDER BY news.created_at DESC");

        $results = $this->db->resultSet();
        
        return $results;

    }

    public function updateCategory($data) {
        $this->db->query('UPDATE category SET name_category = :name_category, updated_at  = NOW() WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name_category', $data['name_category']);
       

        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteCategory($id) {
        $this->db->query('DELETE FROM category WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}