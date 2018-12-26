<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;

class ControllerAdmin {

  public function adminView() {
    require'app/views/admin.php';
  }

  public function updatePost() {
    $update = new Post();
    $post = $update->getPost();
    require'app/views/updatepost.php';
    $post = $update->updatePost();
  }

  public function updateList() {
    $updatelist = new Post();
    $post = $updatelist->listPost();
    require'app/views/updatescreen.php';
  }

  public function createPost() {
    require'app/views/createpost.php';
    $create = new Post();
    $post = $create->createPost();
  }

  public function deleteList() {
    $deletelist = new Post();
    $post = $deletelist->listPost();
    require'app/views/deletescreen.php';
  }

  public function deletePost() {
    $deletepost = new Post();
    $post = $deletepost->deletePost();
  }

  public function deleteCommentary() {
    $deletecommentary = new Commentary();
    $commentary = $deletecommentary->deleteCommentary();
  }

  public function validateCommentary() {
    $validatecommentary = new Commentary();
    $commentary = $validatecommentary->validateCommentary();
  }

  public function listReported() {
    $listcomment = new Commentary();
    $commentary = $listcomment->listReportedCommentary();
    require'app/views/reportedlist.php';
  }

}

?>
