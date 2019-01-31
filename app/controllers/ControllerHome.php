<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;
use Models\Category;

  class ControllerHome {

    public function homeView() {
      try {
        $lastposts = new Post();
        $post = $lastposts->getLastPosts();
        $cat = new Category();
        $category = $cat->listCategory();
        require 'app/views/home.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function signuser() {
      try {
        $userclass = new User();
        $user = $userclass->sign();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function changeAvatar() {
      try {
        $avatar = new User();
        $user = $avatar->avatarUpload();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function memberspace() {
      try {
        $cat = new Category();
        $category = $cat->listCategory();
        require 'app/views/memberspace.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function editUser() {
      try {
        $cat = new Category();
        $category = $cat->listCategory();
        require 'app/views/edituser.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function getPost() {
      try {
        $cat = new Category();
        $category = $cat->listCategory();
        $getpost = new Post();
        $post = $getpost->getPost();
        $getcomment = new Commentary();
        $commentary = $getcomment->listCommentary();
        $getcomment1 = new Commentary();
        $reply = $getcomment1->listReply();
        require 'app/views/article.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function getLastPosts() {
      try {
        $lastposts = new Post();
        $post = $lastposts->listPost();
        require 'app/views/episodes.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function listEpisodes() {
      try {
        $listpost = new Post();
        $post = $listpost->listPost();
        $cat = new Category();
        $category = $cat->listCategory();
        require 'app/views/episodes.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function listCategory() {
      try {
        $listpost = new Post();
        $post = $listpost->listPostBy();
        $cat = new Category();
        $category = $cat->listCategory();
        require 'app/views/episodes.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function sign() {
      try {
        $listpost = new Post();
        $post = $listpost->listPost();
        require 'app/views/episodes.php';
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function login() {
      try {
        $login = new User();
        $login->loginUser();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function logout() {
      try {
        $logout = new User();
        $logout->disconnect();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function logedUser() {
      try {
        $login = new User();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function getComment() {
      try {
        $listcomment = new Commentary();
        $commentary = $listcomment->listCommentary();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function createcomment() {
      try {
        $commentary = new Commentary();
        $comment = $commentary->createCommentary();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function createreply() {
      try {
        $reply = new Commentary();
        $commentReply = $reply->createReply();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function reportCommentary() {
      try {
        $report = new Commentary();
        $comment = $report->reportCommentary();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function deleteUser() {
      try {
        $delete = new User();
        $user = $delete->deleteUser();
        $delete->disconnect();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function changeEmail() {
      try {
        $update = new User();
        $user = $update->deleteUser();
        $update->changeEmail();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

    public function changePassword() {
      try {
        $update = new User();
        $user = $update->deleteUser();
        $update->changePassword();
      }
      catch (\Exception $e) {
        echo $e->getMessage();
      }
    }

  }

?>
