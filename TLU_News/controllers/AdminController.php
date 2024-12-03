<?php
    session_start();
    ob_start();
    include "../db.php";
    include "../models/Users.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangnhap'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $role = checkUsers($username, $password, $conn);
        if ($role !== false) {
            $_SESSION['role'] = $role;
            if ($role == 1) {
                header('Location: dashboard.php');
                exit();
            }elseif ($role == 0) {
                header('Location: ../../models/User.php');
                exit();
            }
        } else {
            $txt_error = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    }
?>