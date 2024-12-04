<?php


class Category{
    function getAllCategory(){
        $host="mysql:host=localhost;dbname=tintuc";
        $user="root";
        $password="";
        $conn = new PDO($host, $user, $password);
        $stmt=$conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categorylist=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorylist;
    }
}