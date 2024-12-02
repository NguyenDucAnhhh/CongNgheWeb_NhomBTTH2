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