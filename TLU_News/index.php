<?php
    require 'models/NewsService.php';
    require 'controllers/AdminController.php';
    $admin = new AdminController();
    if(isset($_GET['action'])&&$_GET['action']== 'add'){
        $admin->addNews();
    }
    else if(isset($_GET['action'])&&$_GET['action']== 'edit'&&isset($_GET['index'])){
        $admin->editNews($_GET['index']);
    }
    else if(isset($_GET['action'])&&$_GET['action']== 'delete'&&isset($_GET['index'])){
        $admin->deleteNews($_GET['index']);
    }
    else $admin->index();

    // phan code trang chu va xem chi tiet tin tuc
    if(isset($_GET['action'])){
        if($_GET['action'] == 'newsdetail' && isset($_GET['id'])){
            $id = $_GET['id'];

            require 'controllers/NewsController.php';
            $newscrtl = new NewsController;
            $newscrtl->showNews($id);
        }
    }
    else{
        require "controllers/HomeController.php";
        $homeCrtl = new HomeController();
        $homeCrtl->showListNew();
    }