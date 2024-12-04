<?php
    
    class HomeController{
        function showListNew(){
            // yeu cau data tu db
            // hien thi len cho ng xem
            // yeu cau: hien thi ds tin tuc. tuc la chi can category, title. het

            require 'models\Category.php';
            $newcategoryser = new Category();
            $list_categories = $newcategoryser->getAllCategory();

            require 'models/News.php';
            $newser = new News();
            $list_news = $newser->getAllNews();

            require 'views/home/index.php'; // goi den views
        }
    }
?>