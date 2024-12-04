<?php

class News{
    public function getAllNews(){
        require 'db.php';
        $stmt=$conn->prepare("SELECT * FROM news");
        $stmt->execute();
        $newslist=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $newslist;
    }
}