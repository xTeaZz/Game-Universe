<?php

namespace App\controllers;
use App\models\Post;
use App\models\User;
use App\models\Commentary;
/*
require 'app/models/User.php';
require 'app/models/Post.php';
require 'app/models/Commentary.php';
*/
  class ControllerHome {

    public function homeView() {
      $lastposts = new Post();
      $post = $lastposts->getLastPosts();
      require 'app/views/home.php';
    }

    public function signuser() {
      $userclass = new User();
      $user = $userclass->sign();
    }

    public function bioView() {
      require 'app/views/bio.php';
    }

    public function getPost() {
      require 'app/models/Commentary.php';
      $getpost = new Post();
      $post = $getpost->getPost();
      $getcomment = new Commentary();
      $commentary = $getcomment->listCommentary();
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

    public function reportCommentary() {
      $report = new Commentary();
      $comment = $report->reportCommentary();
    }

  }

?>
