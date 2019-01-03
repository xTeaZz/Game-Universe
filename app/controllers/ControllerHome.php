<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;

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

    public function createreply() {
      $reply = new Commentary();
      $commentReply = $reply->createReply();
    }

    public function reportCommentary() {
      $report = new Commentary();
      $comment = $report->reportCommentary();
    }

  }

?>
