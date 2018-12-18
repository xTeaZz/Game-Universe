<?php

  class ControllerHome {

    public function homeView() {
      require'app/models/User.php';
      require'app/models/Post.php';
      $lastposts = new Post();
      $post = $lastposts->getLastPosts();
      require'app/views/home.php';
    }

    public function signuser() {
      require'app/models/User.php';
      require'app/models/Post.php';
      $userclass = new User();
      $user = $userclass->sign();
    }

    public function bioView() {
      require'app/models/User.php';
      require'app/views/bio.php';
    }

    public function getPost() {
      require'app/models/User.php';
      require'app/models/Post.php';
      require'app/models/Commentary.php';
      $getpost = new Post();
      $post = $getpost->getPost();
      $getcomment = new Commentary();
      $commentary = $getcomment->listCommentary();
      require'app/views/article.php';
    }

    public function getLastPosts() {
      require'app/models/User.php';
      require'app/models/Post.php';
      $lastposts = new Post();
      $post = $lastposts->listPost();
      require'app/views/episodes.php';
    }

    public function listEpisodes() {
      require'app/models/User.php';
      require'app/models/Post.php';
      $listpost = new Post();
      $post = $listpost->listPost();
      require'app/views/episodes.php';
    }

    public function sign() {
      require'app/models/User.php';
      require'app/models/Post.php';
      $listpost = new Post();
      $post = $listpost->listPost();
      require'app/views/episodes.php';
    }

    public function login() {
      require'app/models/User.php';
      $login = new User();
      $login->loginUser();
    }

    public function logout() {
      require'app/models/User.php';
      $logout = new User();
      $logout->disconnect();
    }

    public function logedUser() {
      require'app/models/User.php';
      $login = new User();
    }

    public function getComment() {
      require'app/models/User.php';
      require'app/models/Post.php';
      require'app/models/Commentary.php';
      $listcomment = new Commentary();
      $commentary = $listcomment->listCommentary();
    }

    public function createcomment() {
      require'app/models/Post.php';
      require'app/models/Commentary.php';
      $commentary = new Commentary();
      $comment = $commentary->createCommentary();
    }

    public function reportCommentary() {
      require'app/models/Post.php';
      require'app/models/Commentary.php';
      $report = new Commentary();
      $comment = $report->reportCommentary();
    }

  }

?>
