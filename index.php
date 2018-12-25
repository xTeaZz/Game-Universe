<?php

    require "vendor/autoload.php";

    use App\controllers\ControllerAdmin;
    use App\controllers\ControllerHome;

    /*
    require "app\controllers\ControllerAdmin.php";
    require "app\controllers\ControllerHome.php";
*/

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
        elseif ($_GET['action'] == 'createpost') {
        $controller = new ControllerAdmin();
        $controller->createPost();
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
        }
    }
    else {
        $controller = new ControllerHome();
        $controller->homeView();
    }

?>