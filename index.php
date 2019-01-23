<?php

    require "vendor/autoload.php";

    use Controllers\ControllerAdmin;
    use Controllers\ControllerHome;
    use Models\Category;

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'episodes') {
            $controller = new ControllerHome();
            $controller->listEpisodes();
        }
        elseif ($_GET['action'] == 'login') {
            $controller = new ControllerHome();
            $controller->login();
        }
        elseif ($_GET['action'] == 'signin') {
            $controller = new ControllerHome();
            $controller->signuser();
        }
        elseif ($_GET['action'] == 'comment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller = new ControllerHome();
            $controller->createcomment();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'reply') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->createreply();
            }
            else {
                echo 'Erreur Aucune page trouvé';
            }
        }
        elseif ($_GET['action'] == 'createpost') {
            $controller = new ControllerAdmin();
            $controller->createPost();
        }
        elseif ($_GET['action'] == 'createCategory') {
            $controller = new ControllerAdmin();
            $controller->createCategory();
        }
        elseif ($_GET['action'] == 'deleteCategory') {
            $controller = new ControllerAdmin();
            $controller->deleteCategory();
        }
        elseif ($_GET['action'] == 'deleteCategoryScreen') {
            $controller = new ControllerAdmin();
            $controller->listCategory();
        }
        elseif ($_GET['action'] == 'delete') {
            $controller = new ControllerAdmin();
            $controller->deleteList();
        }
        elseif ($_GET['action'] == 'deletepost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller = new ControllerAdmin();
            $controller->deletePost();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'update') {
            $controller = new ControllerAdmin();
            $controller->updateList();
        }
        elseif ($_GET['action'] == 'updatepost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerAdmin();
                $controller->updatePost();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'report') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->reportCommentary();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'admin') {
        session_start();
        if ($_SESSION['admin'] == 1) {
            $controller = new ControllerAdmin();
            $controller->adminView();
        }
        else {
            echo"Vous n'êtes pas administrateur";
        }
        }
        elseif ($_GET['action'] == 'bio') {
            $controller = new ControllerHome();
            $controller->bioView();
        }
        elseif ($_GET['action'] == 'article') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->getPost();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'logout') {
            $controller = new ControllerHome();
            $controller->logout();
        }
        elseif ($_GET['action'] == 'moderate') {
            $controller = new ControllerAdmin();
            $controller->listReported();
        }
        elseif ($_GET['action'] == 'validatecommentary') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerAdmin();
                $controller->validateCommentary();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'deleteuser') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->deleteUser();
            }
            else {
                echo 'Erreur Aucune page trouvé';
            }
            }
        elseif ($_GET['action'] == 'member') {
            $controller = new ControllerHome();
            $controller->memberspace();
        }
        elseif ($_GET['action'] == 'changeEmail') {
            $controller = new ControllerHome();
            $controller->changeEmail();
        }
        elseif ($_GET['action'] == 'changePassword') {
            $controller = new ControllerHome();
            $controller->changePassword();
        }
        elseif ($_GET['action'] == 'edituser') {
            $controller = new ControllerHome();
            $controller->editUser();
        }
        elseif ($_GET['action'] == 'deletecommentary') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller = new ControllerAdmin();
            $controller->deleteCommentary();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }
        elseif ($_GET['action'] == 'loged') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller = new ControllerHome();
            $controller->homeView();
        }
        else {
            echo 'Erreur Aucune page trouvé';
        }
        }/*
        $cat = new Category;
        $cat->listCategory();
        while($c = $category->fetch()) {
            if ($_GET['action'] == $c['category_name']) {
                $controller = new ControllerHome();
                $controller->listCategory();
            }  
        }*/
    }
    else {
        $controller = new ControllerHome();
        $controller->homeView();
    }

?>