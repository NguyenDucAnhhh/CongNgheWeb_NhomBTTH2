<?php
    class News{
        public function getAllNews(){
            $host="mysql:host=localhost;dbname=tintuc";
            $user="root";
            $password="";
            $conn = new PDO($host, $user, $password);
            $stmt=$conn->prepare("SELECT * FROM news");
            $stmt->execute();
            $newslist=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $newslist;
        }
    }