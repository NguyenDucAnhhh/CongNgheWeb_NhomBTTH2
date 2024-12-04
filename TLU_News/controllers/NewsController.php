<?php

    Class NewsController{
        function showNews($id){
            require 'models/News.php';
            $news_detail = [];
            $newsser = new News();    // newssver = news service
            $list_news = $newsser->getAllNews();

            foreach($list_news as $value){
                if($value["id"] == $id){
                    $news_detail = $value;
                }
            }
            if($news_detail != ''){
                require 'views/news/detail.php';
            }
            else{
                echo 'khong tim thay tin tuc';
            }
            
        }
    }
?>
