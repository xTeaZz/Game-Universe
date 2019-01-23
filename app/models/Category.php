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
    
              $info = "Votre catégorie a bien était crée";
            }
            else {
              $info = "Veuillez remplir tous les champs";
            }
        }
        if (isset($info)) {
            echo $info;
        }
    }

    public function deleteCategory() {
        $db = Database::getConnection();
        if(isset($_GET['id']) AND !empty($_GET['id'])) {
            $delete_category = htmlspecialchars($_GET['id']);
    
            $delete = $db->prepare('DELETE FROM category WHERE id = ?');
            $delete->execute(array($delete_category));

            $info = "Votre catégorie a bien était supprimer";
    }
    else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }

    public function listCategory() {
        $db = Database::getConnection();
        $category = $db->query('SELECT * FROM category ORDER BY id DESC');
        return $category;
      }

}

?>