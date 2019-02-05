<?php

namespace Models;

  require_once'Database.php';

  class Commentary extends Database {

    /*Permet de lister les commentaires fait une liaison avec la table utilisateur pour récuperer les pseudos*/

    public function listCommentary() {
      $db = Database::getConnection();
      $postId = htmlspecialchars($_GET['id']);
      $commentary = $db->prepare('SELECT *, comment.id AS c_id FROM comment INNER JOIN user ON comment.id_user = user.id WHERE id_post = ? AND id_parent = 0 ORDER BY comment.id ASC');
      $commentary->execute(array($postId));
      return $commentary;


    }

/*Permet de lister les commentaires signaler*/

    public function listReportedCommentary() {
      $db = Database::getConnection();
      $commentary = $db->prepare('SELECT * FROM comment WHERE report = 1 ORDER BY id_post');
      $commentary->execute();
      return $commentary;
    }

/*Permet de crée un commentaire*/

    public function createCommentary() {
      session_start();
      $db = Database::getConnection();
      if (isset($_SESSION['id'])) {
        if (isset($_POST['comment'])) {
          if(!empty($_POST['comment'])){
            $postCommentary = htmlspecialchars($_POST['comment']);
            $postId = ($_GET['id']);
            $userid= ($_SESSION['id']);
            $insert = $db->prepare('INSERT INTO comment(id_user, id_post, comment_text, comment_date) VALUES (?, ?, ?, NOW())');
            $result = $insert->execute(array($userid, $postId, $postCommentary));
            header('Location: index.php?action=article&id='.$postId);
          }
          else {
            throw new \Exception('Veuillez remplir tout les champs');
          }
        }
      }
      else {
        throw new \Exception('Vous devez être connecter pour réaliser cette action');
      }
    }

/*Permet de supprimer un commentaire*/

    public function deleteCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $deleteComment = htmlspecialchars($_GET['id']);
        $delete = $db->prepare('DELETE FROM comment WHERE id = ?');
        $delete->execute(array($deleteComment));
        header('Location: index.php?action=moderate');
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    /*Permet de valider un commentaire*/

    public function validateCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $reportId = htmlspecialchars($_GET['id']);
        $report = $db->prepare('UPDATE comment SET report = 0 WHERE id = ?');
        $report->execute(array($reportId));
        header('Location: index.php?action=moderate');
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    /*Permet de signaler un commentaire*/

    public function reportCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $postId = htmlspecialchars($_GET['postid']);
        $reportId = htmlspecialchars($_GET['id']);
        $report = $db->prepare('UPDATE comment SET report = 1 WHERE id = ?');
        $report->execute(array($reportId));
        header('Location: index.php?action=article&id='.$postId);
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    public function createReply() {
      session_start();
      $db = Database::getConnection();
      if (isset($_SESSION['id'])) {
        if (isset($_POST['comment'])) {
          if(!empty($_POST['comment'])){
            $content = htmlspecialchars($_POST['comment']);
            $commentId = ($_GET['id']);
            $userid= ($_SESSION['id']);
            $id_post = ($_GET['post']);
            $insert = $db->prepare('INSERT INTO comment(id_user, id_post, id_parent, comment_text, comment_date) VALUES (?, ?, ?, ?, NOW())');
            $result = $insert->execute(array($userid, $id_post, $commentId,  $content));
            header('Location: index.php?action=article&id='.$id_post);
          }
          else {
            throw new \Exception('Veuillez remplir tout les champs');
          }
        }
      }
      else {
        throw new \Exception("Vous devez être connecter pour réaliser cette action");
      }
    }

    public function listReply() {
      $db = Database::getConnection();
      $postId = htmlspecialchars($_GET['id']);
      $reply = $db->prepare('SELECT * FROM comment INNER JOIN user ON id_user = user.id WHERE id_parent != 0 AND id_post = ? ORDER BY comment.id ASC');
      $reply->execute(array($postId));
      return $reply;
    }

  }
?>
