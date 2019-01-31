<?php

namespace Models;

class Category extends Database {

    public function createCategory() {
        $db = Database::getConnection();
        if (isset($_POST['title'])) {
            if(!empty($_POST['title'])){
              $postTitle = htmlspecialchars($_POST['title']);
              $insert = $db->prepare('INSERT INTO category(category_name) VALUES (?)');
              $insert->execute(array($postTitle));  
              header('Location: index.php?action=admin');
            }
            else {
                throw new \Exception('Veuillez remplir tout les champs');
            }
        }
    }

    public function deleteCategory() {
        $db = Database::getConnection();
        if(isset($_GET['id']) AND !empty($_GET['id'])) {
            $delete_category = htmlspecialchars($_GET['id']);
            $delete = $db->prepare('DELETE FROM category WHERE id = ?');
            $delete->execute(array($delete_category));
            header('Location: index.php?action=admin');
        }
        else {
            throw new \Exception('Une erreur est survenue');
        }
    }

    public function listCategory() {
        $db = Database::getConnection();      
        $category = $db->query('SELECT * FROM category ORDER BY id DESC');
        return $category;
      }

}

?>