<?php

namespace Models;

  require_once 'Database.php';

  class Post extends Database {

    /*Permet de recuperer un article grace a l'id de la barre de navigation*/

    public function getPost() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getId = htmlspecialchars($_GET['id']);
        $post = $db->prepare('SELECT *, post.id AS p_id FROM post INNER JOIN category ON post.category_id = category.id WHERE post.id = ?');
        $post->execute(array($getId));
        $post = $post->fetch();
      } else {
        throw new \Exception('Article introuvable');
      }
      return $post;
    }

    /*Permet de crée un article*/

    public function createPost() {
      $db = Database::getConnection();
      if (isset($_POST['title'], $_POST['postText'])) {
        if(!empty($_POST['title']) AND !empty($_POST['postText'])){
          $postTitle = htmlspecialchars($_POST['title']);
          $postMessage = ($_POST['postText']);
          $categorie = $_POST['categories'];
          $insert = $db->prepare('INSERT INTO post(title, message, category_id, creation_date) VALUES (?, ?, ?, NOW())');
          $insert->execute(array($postTitle, $postMessage, $categorie));
          header('Location: index.php');
        } else {
          throw new \Exception('Veuillez remplir tout les champs');
        }
      }
      if(isset($_FILES['picture'])) {
        var_dump($_FILES['picture']);
        if($_FILES['picture']['size'] <= 2000000 || $_FILES['picture']['size'] == 0) {
          $temporary = $_FILES['picture']['tmp_name'];
          $extension = substr(strrchr ($_FILES['picture']['name'], "."), 1);
          if($extension == "jpg" || $extension == "png" || $extension == "PNG" || $extension == "JPEG") {
            $pictureName = $_SESSION['id'].'.'.'jpg';
            $finalName = 'src/post/'.$pictureName;
            $upload = move_uploaded_file($temporary, $finalName);
          } else {
            throw new \Exception('Le type de fichier est incorrect');
          }
        } else {
          throw new \Exception("La taille de l'image ne doit pas dépasser 2Mb");
        } 
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    /*Permet de modifier un article il récupere les informations de l'article puis les modifie*/

    public function updatePost() {
      $db = Database::getConnection();
      if (isset($_POST['title'], $_POST['postText'])) {
        if(!empty($_POST['title']) AND !empty($_POST['postText'])){
          if(isset($_GET['id']) AND !empty($_GET['id'])) {
            $update_post = htmlspecialchars($_GET['id']);
          $post_title = htmlspecialchars($_POST['title']);
          $post_message =($_POST['postText']);
          $categorie = $_POST['categories'];
          $update = $db->prepare('UPDATE post SET title = ?, message = ?, categorie = ? WHERE id = ?');
          $update->execute(array($post_title, $post_message, $categorie, $update_post));
          header('Location: index.php?action=article&id='.$update_post);
          }
        } else {
          throw new \Exception('Veuilez remplir tout les champs');
        }
      }
    }

    /*Permet de lister les articles*/

    public function listPost() {
      $db = Database::getConnection();
      $post = $db->query('SELECT * FROM post ORDER BY id DESC');
      return $post;
    }

    public function listPostBy() {
      $db = Database::getConnection();
      $id = htmlspecialchars($_GET['id']);
      $post = $db->prepare('SELECT * FROM post WHERE category_id = ? ORDER BY id DESC');
      $post->execute(array($id));
      return $post;
    }

    /*Permet de récuperer les trois article les plus récent*/

    public function getLastPosts() {
      $db = Database::getConnection();
      $post = $db->query('SELECT * FROM post ORDER BY id DESC LIMIT 3');
      return $post;
    }

    /*Permet de supprimer un article*/

    public function deletePost() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $delete_post = htmlspecialchars($_GET['id']);
        $delete = $db->prepare('DELETE FROM post WHERE id = ?');
        $delete->execute(array($delete_post));
        $delete_comment = $db->prepare('DELETE FROM comment WHERE id_post = ?');
        $delete_comment->execute(array($delete_post));
        header('Location: index.php?action=delete');
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    public function imageUpload() {
      $db = Database::getConnection();
      if(isset($_FILES['picture'])) {
        var_dump($_FILES['picture']);
        if($_FILES['picture']['size'] <= 2000000 || $_FILES['picture']['size'] == 0) {
          $temporary = $_FILES['picture']['tmp_name'];
          $extension = substr(strrchr ($_FILES['picture']['name'], "."), 1);
          if($extension == "jpg" || $extension == "png" || $extension == "PNG" || $extension == "JPEG") {
            $pictureName = $_SESSION['id'].'.'.'jpg';
            $finalName = 'src/post/'.$pictureName;
            $upload = move_uploaded_file($temporary, $finalName);
          } else {
            throw new \Exception('Le type de fichier est incorrect');
          }
        } else {
          throw new \Exception("La taille de l'image ne doit pas dépasser 2Mb");
        } 
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

  }

?>
