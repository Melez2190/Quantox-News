<?php 

namespace App\Models;
use App\Core\Database;

class Subscriber {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getAllSub(){
        $data = $this->db->query("SELECT * FROM subscriptions");
        
        $results = $this->db->resultSet();
        
        
        return $results;
    }
    public function addNewsSubsriber($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
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
    public function getSubsrciber() {
        $data = $this->db->query("SELECT subscriptions.id, subscriptions.user_email, news.title, category.name_category FROM subscriptions LEFT JOIN news ON (subscriptions.news_id = news.id) LEFT JOIN category ON (subscriptions.category_id = category.id) ");

        $results = $this->db->resultSet();
      
       

        return $results;

    }

}