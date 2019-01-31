<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;
use Models\Category;

class ControllerAdmin {

  public function adminView() {
    $cat = new Category();
    $category = $cat->listCategory();
    require'app/views/admin.php';
  }

  public function updatePost() {
    $cat = new Category();
    $category = $cat->listCategory();
    $update = new Post();
    $post = $update->getPost();
    require'app/views/updatepost.php';
    $post = $update->updatePost();
  }

  public function updateList() {
    $cat = new Category();
    $category = $cat->listCategory();
    $updatelist = new Post();
    $post = $updatelist->listPost();
    require'app/views/updatescreen.php';
  }

  public function createPost() {
    $cat = new Category();
    $category = $cat->listCategory();
    $cat2 = new Category();
    $category2 = $cat2->listCategory();
    require'app/views/createpost.php';
    $create = new Post();
    $post = $create->createPost();
    $pic = new Post();
    $pic->imageUpload();
  }

  public function deleteCategoryScreen() {
    $cat = new Category();
    $category = $cat->listCategory();
    $delete = new Category();
    $category = $delete->listCategory();
    require'app/views/deletecategory.php';
  }

  public function deleteCategory() {
    $delete = new Category();
    $category = $delete->deleteCategory();
  }

  public function createCategory() {
    $cat = new Category();
    $category = $cat->listCategory();
    require'app/views/createcategory.php';
    $update = new Category();
    $post = $update->createCategory();
    
  }

  public function deleteList() {
    $cat = new Category();
    $category = $cat->listCategory();
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
    $cat = new Category();
    $category = $cat->listCategory();
    $listcomment = new Commentary();
    $commentary = $listcomment->listReportedCommentary();
    require'app/views/reportedlist.php';
  }

}

?>
