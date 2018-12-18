<?php

  require_once'Database.php';

  class Commentary extends Database {

    /*Permet de lister les commentaires fait une liaison avec la table utilisateur pour récuperer les pseudos*/

    public function listCommentary() {
      $db = Database::getConnection();
      $postId = htmlspecialchars($_GET['id']);
      $commentary = $db->prepare('SELECT *, comment.id AS c_id FROM comment INNER JOIN user ON comment.id_user = user.id WHERE id_post = ? ORDER BY comment.id DESC');
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

            $info = "Votre commentaire a bien était crée";
          }
          else {
          $info = "Veuillez remplir tous les champs";
        }
      }
    }
    else {
      $info ="Vous devez être connecter pour réaliser cette action";
    }
      if (isset($info)) {
        echo $info;
      }
    }

/*Permet de supprimer un commentaire*/

    public function deleteCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $deleteComment = htmlspecialchars($_GET['id']);

        $delete = $db->prepare('DELETE FROM comment WHERE id = ?');
        $delete->execute(array($deleteComment));

        $info = "Votre commentaire a bien était supprimer";
      }
      else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }

    /*Permet de valider un commentaire*/

    public function validateCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $reportId = htmlspecialchars($_GET['id']);

        $report = $db->prepare('UPDATE comment SET report = 0 WHERE id = ?');
        $report->execute(array($reportId));

        $info = "Votre commentaire a bien était valider";
      }
      else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }

    /*Permet de signaler un commentaire*/

    public function reportCommentary() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $reportId = htmlspecialchars($_GET['id']);

        $report = $db->prepare('UPDATE comment SET report = 1 WHERE id = ?');
        $report->execute(array($reportId));

        $info = "Votre commentaire a bien était signaler";
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
