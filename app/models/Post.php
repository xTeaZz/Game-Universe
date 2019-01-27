<?php

namespace Models;

  require_once 'Database.php';

  class Post extends Database {

    /*Permet de recuperer un article grace a l'id de la barre de navigation*/

    public function getPost() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getId = htmlspecialchars($_GET['id']);
        $post = $db->prepare('SELECT * FROM post INNER JOIN category ON post.category_id = category.id WHERE post.id = ?');
        $post->execute(array($getId));
        $post = $post->fetch();
        $title = $post['title'];
        $message = $post['message'];
        $message = $post['category_name'];
      } else {
        echo "Article Introuvable";
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

          $info = "Votre Article a bien était crée";
        } else {
          $info = "Veuillez remplir tous les champs";
        }
      }
      if (isset($info)) {
        echo $info;
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
          $info = "Votre Article a bien était modifier";
          }
        } else {
          $info = "Veuillez remplir tous les champs";
        }
      }
      if (isset($info)) {
        echo $info;

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

        $info = "Votre Article a bien était supprimer";
      }
      else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }
  }

?>
