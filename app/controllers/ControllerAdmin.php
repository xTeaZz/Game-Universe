<?php

namespace App\controllers;

class ControllerAdmin {

  public function adminView() {
    require'app/models/User.php';
    require'app/views/admin.php';
  }

  public function updatePost() {
    require'app/models/User.php';
    require'app/models/Post.php';
    $update = new Post();
    $post = $update->getPost();
    require'app/views/updatepost.php';
    $post = $update->updatePost();
  }

  public function updateList() {
    require'app/models/User.php';
    require'app/models/Post.php';
    $updatelist = new Post();
    $post = $updatelist->listPost();
    require'app/views/updatescreen.php';
  }

  public function createPost() {
    require'app/models/User.php';
    require'app/models/Post.php';
    require'app/views/createpost.php';
    $create = new Post();
    $post = $create->createPost();
  }

  public function deleteList() {
    require'app/models/User.php';
    require'app/models/Post.php';
    $deletelist = new Post();
    $post = $deletelist->listPost();
    require'app/views/deletescreen.php';
  }

  public function deletePost() {
    require'app/models/User.php';
    require'app/models/Post.php';
    $deletepost = new Post();
    $post = $deletepost->deletePost();
  }

  public function deleteCommentary() {
    require'app/models/Commentary.php';
    $deletecommentary = new Commentary();
    $commentary = $deletecommentary->deleteCommentary();
  }

  public function validateCommentary() {
    require'app/models/Commentary.php';
    $validatecommentary = new Commentary();
    $commentary = $validatecommentary->validateCommentary();
  }

  public function listReported() {
    require'app/models/Commentary.php';
    require'app/models/Post.php';
    $listcomment = new Commentary();
    $commentary = $listcomment->listReportedCommentary();
    require'app/views/reportedlist.php';
  }

}

?>
