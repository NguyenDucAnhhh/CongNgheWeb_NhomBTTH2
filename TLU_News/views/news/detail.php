
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $news_detail["title"]?></title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container"> 

        <h1 class="display-4"><?= $news_detail["title"]?></h1>
        <p class="text-muted">Ngày đăng: <?= $news_detail["created_at"]?></p>

        <div class="card mb-3">
            <img src="<?= $news_detail["image"]?>" class="card-img-top" alt="<?= $news_detail["title"]?>">
            <div class="card-body">
                <p class="card-text"><?= $news_detail["content"]?></p>
            </div>
        </div>

        <a href="index.php" class="btn btn-primary">Quay về</a>
    </div>
</body>
</html>
