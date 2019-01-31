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
            throw new \Exception('Mail ou mot de passe incorrect');
           }
          }
          else {
            throw new \Exception('Tout les champs doivent êtres complété');
          }
        }
        else {
          throw new \Exception('Une erreur est survenue');
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
                header("Location: index.php");
              }
              else {
                throw new \Exception('Veuillez saisir un mail correct');
              }
            }
            else {
              throw new \Exception('Adresse E-mail déjà utiliser');
            }
          }
          else {
            throw new \Exception('Votre pseudo ne doit pas dépasser 255 caractères');
          }
        }
        else {
          throw new \Exception('Tout les champs doivent êtres complété');
        }
      }
      else {
        throw new \Exception('Captcha non rempli');
      }
      }
      else {
        throw new \Exception('Une erreur est survenue');
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
        header("Location: index.php");
      }
      else {
        throw new \Exception('Une erreur est survenue');
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
        header("Location: index.php?action=member");
      }
      else {
        throw new \Exception('Une erreur est survenue');
      }
    }

    public function changePassword() {
      $db = Database::getConnection();
        $pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        session_start();
        $idUser = $_SESSION['id'];
        $update = $db->prepare('UPDATE user SET password = ? WHERE id = ?');
        $update->execute(array($delete_user));
        header("Location: index.php?action=member");
      }

      public function avatarUpload() {
        $db = Database::getConnection();
        session_start();
        if(isset($_FILES['avatar'])) {
          if($_FILES['avatar']['size'] <= 2000000 || $_FILES['avatar']['size'] == 0) {
            $temporary = $_FILES['avatar']['tmp_name'];
            $extension = substr(strrchr ($_FILES['avatar']['name'], "."), 1);
            if($extension == "jpg" || $extension == "png" || $extension == "PNG" || $extension == "JPEG") {
              $avatarName = $_SESSION['id'].'.'.'jpg';
              $finalName = 'src/avatar/'.$avatarName;
              $upload = move_uploaded_file($temporary, $finalName);
              header("Location: index.php?action=member");
            } else {
              throw new \Exception('Le type de fichier est incorrect');
            }
          } else {
            throw new \Exception("La taille de l'image est trop grande");
          } 
        }
        else {
          throw new \Exception('Une erreur est survenue');
        }
      }

  }

?>
