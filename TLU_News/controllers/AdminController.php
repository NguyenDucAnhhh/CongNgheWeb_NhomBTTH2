<?php
    session_start();
    ob_start();
    require_once __DIR__ . '/../db.php';
    require_once __DIR__ . '/../models/Users.php';
    
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
                header('Location: ../../views/home/index.php');
                exit();
            }
        } else {
            $txt_error = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    }

    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_unset();
        session_destroy();
        header('Location: ../views/admin/login.php');
        exit();
    }
?>