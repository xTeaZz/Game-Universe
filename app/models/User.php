<?php

namespace Models;

  require_once'Database.php';

  class User extends Database {

    /*Permet de deconnecter l'utilisateur*/

    public function disconnect() {
      session_start();
      $_SESSION = array();
      session_destroy();
      header('Location: index.php');
    }

    /*Permet de connecter un utilisateur*/

    public function loginUser() {
      $db = Database::getConnection();
      if(isset($_POST['buttonLogin'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $pass = ($_POST['pass']);
        if(!empty($mail) AND !empty($pass)) {
          $requser = $db->prepare("SELECT * FROM user WHERE email = ?");
          $result = $requser->execute(array($mail));
             $userinfo = $requser->fetch();
             $isPasswordCorrect = password_verify($pass, $userinfo['password']);
             if ($isPasswordCorrect) {
             session_start();
             $_SESSION['id'] = $userinfo['id'];
             $_SESSION['alias'] = $userinfo['alias'];
             $_SESSION['email'] = $userinfo['email'];
             $_SESSION['admin'] = $userinfo['admin'];
             header("Location: index.php?action=loged&id=".$_SESSION['id']);
           }
           else {
             echo "Mail ou Mot de passe incorrect";
           }
          }
          else {
            echo "Tous les champs doivent être complétés";
          }
        }
        else {
          echo "Un problème est surevenu";
        }
      }

      /*Permet d'enregistrer un utilisateur*/

    public function sign() {
      $db = Database::getConnection();
      if(isset($_POST['buttonSign'])) {
          if($_POST['g-recaptcha-response'] != ''){
            $recaptcha = new \ReCaptcha\ReCaptcha('6LdR-IQUAAAAAMqd2np9IqiKbPaZrA4V2IHltwmG');
            $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
              if ($resp->isSuccess()) {
                } else {
                $errors = $resp->getErrorCodes();
              }
          if(!empty($_POST['alias']) AND !empty($_POST['mail']) AND !empty($_POST['pass'])) {
          $alias = htmlspecialchars($_POST['alias']);
          $mail = htmlspecialchars($_POST['mail']);
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
          $aliaslength = strlen($alias);
          if($aliaslength <= 255){
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $reqmail = $db->prepare("SELECT * FROM user WHERE email = ?");
              $reqmail->execute(array($mail));
              $verifmail = $reqmail->rowCount();
              if($verifmail == 0){
                $insertmember = $db->prepare("INSERT INTO user(alias, email, password) VALUES(?, ?, ?)");
                $insertmember->execute(array($alias, $mail, $pass));
                $error = "Votre compte a bien était crée";
              }
              else {
                $error = "Veuillez saisir un mail correct";
              }
            }
            else {
              $error = "Adresse Email déjà utilisée";
            }
          }
          else {
            $error = "Votre pseudo ne doit pas dépasser 255 caractères";
          }
        }
        else {
          $error= "Tout les champs doivent être complétés";
        }
      }
      else {
        $error= "Captcha non rempli";
      }
      }
      if(isset($error)) {
        echo $error;
      }
      else {
        echo "Une erreur est surevenue";
      }
    }

    public function deleteUser() {
      $db = Database::getConnection();
      if(isset($_GET['id']) AND !empty($_GET['id'])) {
        $delete_user = htmlspecialchars($_GET['id']);
        $usernickname = 'Anonymous';
        $email = '';
        $delete = $db->prepare('UPDATE user SET alias = ?, email = ? WHERE id = ?');
        $delete->execute(array($usernickname, $email, $delete_user));

        $info = "Votre Compte a bien était supprimer";
      }
      else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }

    public function changeEmail() {
      $db = Database::getConnection();
      if(isset($_POST['changeEmail'])) {
        $newEmail = htmlspecialchars($_POST['newEmail']);
        session_start();
        $idUser = $_SESSION['id'];

        $update = $db->prepare('UPDATE user SET email = ? WHERE id = ?');
        $update->execute(array($newEmail, $idUser));

        $info = "Votre Email a était modifier";
      }
      else {
        $info = "Une erreur est survenue";
      }
      if (isset($info)) {
        echo $info;
      }
    }

    public function changePassword() {
      $db = Database::getConnection();
        $pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        session_start();
        $idUser = $_SESSION['id'];
        $update = $db->prepare('UPDATE user SET password = ? WHERE id = ?');
        $update->execute(array($delete_user));

        $info = "Votre mot de passe a était modifier";
        
        if (isset($info)) {
          echo $info;
        }
      }

  }

?>
