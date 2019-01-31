<?php

namespace Controllers;
use Models\Post;
use Models\User;
use Models\Commentary;
use Models\Category;

class ControllerAdmin {

  public function adminView() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      require'app/views/admin.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function updatePost() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $update = new Post();
      $post = $update->getPost();
      require'app/views/updatepost.php';
      $post = $update->updatePost();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function updateList() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $updatelist = new Post();
      $post = $updatelist->listPost();
      require'app/views/updatescreen.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function createPost() {
    try {
      //$pic = new Post();
      //$picture = $pic->imageUpload();
      $create = new Post();
      $post = $create->createPost();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function createScreen() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $cat2 = new Category();
      $category2 = $cat2->listCategory();
      require'app/views/createpost.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function deleteCategoryScreen() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $delete = new Category();
      $category1 = $delete->listCategory();
      require'app/views/deletecategory.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function deleteCategory() {
    try {
      $delete = new Category();
      $category = $delete->deleteCategory();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function createCategory() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      require'app/views/createcategory.php';
      $update = new Category();
      $post = $update->createCategory();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
    
  }

  public function deleteList() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $deletelist = new Post();
      $post = $deletelist->listPost();
      require'app/views/deletescreen.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function deletePost() {
    try {
      $deletepost = new Post();
      $post = $deletepost->deletePost();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function deleteCommentary() {
    try {
      $deletecommentary = new Commentary();
      $commentary = $deletecommentary->deleteCommentary();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function validateCommentary() {
    try {
      $validatecommentary = new Commentary();
      $commentary = $validatecommentary->validateCommentary();
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function listReported() {
    try {
      $cat = new Category();
      $category = $cat->listCategory();
      $listcomment = new Commentary();
      $commentary = $listcomment->listReportedCommentary();
      require'app/views/reportedlist.php';
    }
    catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

}

?>
