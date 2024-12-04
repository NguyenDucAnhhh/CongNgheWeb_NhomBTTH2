<?php

    // điều kiện để xem chi tiết tin tức: action = newsdetail. có thể thay đổi tùy ý điều kiện
    if(isset($_GET['action'])){
        if($_GET['action'] == 'newsdetail' && isset($_GET['id'])){
            $id = $_GET['id'];

            require 'controllers/NewsController.php';
            $newscrtl = new NewsController;
            $newscrtl->showNews($id);
        }
    }
    else{

        // nếu ko có điều kiện xem tin tức. Nhận được điều kiện vào trang chủ thì hiển thị trang chủ
        // trang chủ ở đây là home/index
        require "controllers/HomeController.php";
        $homeCrtl = new HomeController();
        $homeCrtl->showListNew();
    }