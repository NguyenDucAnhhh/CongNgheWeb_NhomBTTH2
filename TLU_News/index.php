<?php

require 'controllers/NewsController.php';
if(isset($_GET['action'])){
    if($_GET['action'] == 'add'){
        $controller = new NewsController();
        $controller->addNews();
    }
    else if($_GET['action'] == 'edit'&&isset($_GET['index'])){
        $controller = new NewsController();
        $controller->editNews($_GET['index']);
    }
    else if($_GET['action'] == 'delete'&&isset($_GET['index'])){
        $controller = new NewsController();
        $controller->deleteNews($_GET['index']);
    }
}
else {
    $controller = new NewsController();
    $controller->index();
}
?>