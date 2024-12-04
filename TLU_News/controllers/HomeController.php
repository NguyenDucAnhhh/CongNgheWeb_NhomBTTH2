<?php
// Kết nối PDO
function connectDB() {
    $host = "localhost"; // Địa chỉ máy chủ
    $dbname = "tintuc"; // Tên cơ sở dữ liệu
    $username = "root"; // Tên người dùng
    $password = ""; // Mật khẩu
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Kết nối thất bại: " . $e->getMessage());
    }
}

// Hàm tìm kiếm
function TimKiemPDO($conn, $tukhoa) {
    try {
        // Câu lệnh SQL
        $sql = "SELECT * FROM news 
                WHERE title like :tukhoa  
                ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $searchKeyword = "%" . $tukhoa . "%";
        $stmt->bindParam(':tukhoa', $searchKeyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return [];
    }
}


// Kết nối CSDL
$conn = connectDB();

// Tìm kiếm
$tukhoa = '';
$ketqua = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tukhoa = trim($_POST['search']);
    if (!empty($tukhoa)) {
        $ketqua = TimKiemPDO($conn, $tukhoa);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <style>
        .news { margin-bottom: 20px; }
        .title { font-size: 20px; font-weight: bold; }
        .des { font-size: 14px; color: #555; }
        .images_news { max-width: 150px; margin-right: 10px; float: left; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
<h1>Tìm kiếm Tin tức</h1>

<!-- Form nhập từ khóa tìm kiếm -->
<form method="POST">
    <input type="text" name="search" placeholder="Nhập từ khóa..." value="<?php echo htmlspecialchars($tukhoa); ?>" required>
    <button type="submit">Tìm kiếm</button>
</form>

<!-- Hiển thị kết quả tìm kiếm -->
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if (!empty($ketqua)): ?>
        <h2>Kết quả tìm kiếm cho "<?php echo htmlspecialchars($tukhoa); ?>"</h2>
        <?php foreach ($ketqua as $tin): ?>
            <div class="news">
                <h3 class="title">
                    <a href="index.php?p=chitiettin&idTin=<?php echo $tin['id']; ?>">
                        <?php echo htmlspecialchars($tin['title']); ?>
                    </a>
                </h3>
                <div style="clear: both;"></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy kết quả nào phù hợp với từ khóa "<?php echo htmlspecialchars($tukhoa); ?>"</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>