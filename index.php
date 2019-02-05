<?php

    require "vendor/autoload.php";

    use Controllers\ControllerAdmin;
    use Controllers\ControllerHome;
    use Models\Category;
    try {
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
                throw new \Exception('Auncune page trouvée');
            }
            }
            elseif ($_GET['action'] == 'reply') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller = new ControllerHome();
                    $controller->createreply();
                }
                else {
                    throw new \Exception('Auncune page trouvée');
                }
            }
            elseif ($_GET['action'] == 'createpost') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                        $controller = new ControllerAdmin();
                        $controller->createPost();
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'createCategory') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                        $controller = new ControllerAdmin();
                        $controller->createCategory();
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'deleteCategory') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                        $controller = new ControllerAdmin();
                        $controller->deleteCategory();
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }  
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'deleteCategoryScreen') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                        $controller = new ControllerAdmin();
                        $controller->deleteCategoryScreen();
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'delete') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                            $controller = new ControllerAdmin();
                            $controller->deleteList();
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'deletepost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerAdmin();
                $controller->deletePost();
            }
            else {
                throw new \Exception('Auncune page trouvée');
            }
            }
            elseif ($_GET['action'] == 'update') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                        $controller = new ControllerAdmin();
                        $controller->updateList(); 
                    }
                    else {
                        throw new \Exception("Vous n'êtes pas administrateur");
                    }
                }
                else {
                    throw new \Exception("Vous n'êtes pas administrateur");
                }
            }
            elseif ($_GET['action'] == 'updatepost') {
                session_start();
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['admin'] == 1) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller = new ControllerAdmin();
                    $controller->updatePost();
            }
            else {
                throw new \Exception("Vous n'êtes pas administrateur");
            }
        }
            else {
                throw new \Exception("Vous n'êtes pas administrateur");
            }
            }
        }
            elseif ($_GET['action'] == 'report') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller = new ControllerHome();
                    $controller->reportCommentary();
            }
            else {
                throw new \Exception('Auncune page trouvée');
            }
            }
            elseif ($_GET['action'] == 'admin') {
                session_start();
                if ($_SESSION['admin'] == 1) {
                    $controller = new ControllerAdmin();
                    $controller->adminView();
                }   
            else {
                throw new \Exception("Vous n'êtes pas administrateur");
            }
            }
            elseif ($_GET['action'] == 'article') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller = new ControllerHome();
                    $controller->getPost();
            }
            else {
                throw new \Exception('Auncune page trouvée');
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
                throw new \Exception('Auncune page trouvée');
            }
            }
            elseif ($_GET['action'] == 'deleteuser') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controller = new ControllerHome();
                    $controller->deleteUser();
                }
                else {
                    throw new \Exception('Auncune page trouvée');
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
            elseif ($_GET['action'] == 'changeAvatar') {
                $controller = new ControllerHome();
                $controller->changeAvatar();
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
                throw new \Exception('Auncune page trouvée');
            }
            }
            elseif ($_GET['action'] == 'loged') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->homeView();
            }
            else {
                throw new \Exception('Auncune page trouvée');
            }
            }
            if ($_GET['action'] == 'category') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller = new ControllerHome();
                $controller->listCategory();
                }
            } 
        }
        else {
            $controller = new ControllerHome();
            $controller->homeView();
        }
    }

    catch(Exception $e){
        echo $e->getMessage();
    }

?>