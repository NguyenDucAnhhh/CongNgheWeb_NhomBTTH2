<?php
    session_start();
    ob_start();
    include "../../db.php";
    include "../../models/Users.php";
    
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
                header('Location: ../../controllers/AdminController.php');
                exit();
            }
        } else {
            $txt_error = "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Đăng nhập cho quản trị viên</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
        </form>
        <?php if (!empty($txt_error)): ?>
            <p class="text-danger mt-3"><?= $txt_error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
