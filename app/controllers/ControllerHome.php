<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;
use Models\Category;

  class ControllerHome {

    public function homeView() {
      $lastposts = new Post();
      $post = $lastposts->getLastPosts();
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/views/home.php';
    }

    public function signuser() {
      $userclass = new User();
      $user = $userclass->sign();
    }

    public function changeAvatar() {
      $avatar = new User();
      $user = $avatar->avatarUpload();
    }

    public function memberspace() {
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/views/memberspace.php';
    }

    public function editUser() {
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/views/edituser.php';
    }

    public function getPost() {
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/models/Commentary.php';
      $getpost = new Post();
      $post = $getpost->getPost();
      $getcomment = new Commentary();
      $commentary = $getcomment->listCommentary();
      $reply = $getcomment->listReply();
      require 'app/views/article.php';
    }

    public function getLastPosts() {
      $lastposts = new Post();
      $post = $lastposts->listPost();
      require 'app/views/episodes.php';
    }

    public function listEpisodes() {
      $listpost = new Post();
      $post = $listpost->listPost();
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/views/episodes.php';
    }

    public function listCategory() {
      $listpost = new Post();
      $post = $listpost->listPostBy();
      $cat = new Category();
      $category = $cat->listCategory();
      require 'app/views/episodes.php';
    }

    public function sign() {
      $listpost = new Post();
      $post = $listpost->listPost();
      require 'app/views/episodes.php';
    }

    public function login() {
      $login = new User();
      $login->loginUser();
    }

    public function logout() {
      $logout = new User();
      $logout->disconnect();
    }

    public function logedUser() {
      $login = new User();
    }

    public function getComment() {
      $listcomment = new Commentary();
      $commentary = $listcomment->listCommentary();
    }

    public function createcomment() {
      $commentary = new Commentary();
      $comment = $commentary->createCommentary();
    }

    public function createreply() {
      $reply = new Commentary();
      $commentReply = $reply->createReply();
    }

    public function reportCommentary() {
      $report = new Commentary();
      $comment = $report->reportCommentary();
    }

    public function deleteUser() {
      $delete = new User();
      $user = $delete->deleteUser();
      $delete->disconnect();
    }

    public function changeEmail() {
      $update = new User();
      $user = $update->deleteUser();
      $update->changeEmail();
    }

    public function changePassword() {
      $update = new User();
      $user = $update->deleteUser();
      $update->changePassword();
    }

  }

?>
