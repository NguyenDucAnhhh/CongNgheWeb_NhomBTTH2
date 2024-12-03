<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $news_detail['title']?></title>
    <style>
        .content{
            background-color: grey;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1><?= $news_detail['title']?></h1>
    báo mới ngày <?= $news_detail['created_at']?>
    <br>
    <br>
    <div class="content">
        <?= $news_detail['content']?>
    </div>
    <p>Ảnh minh họa</p>
    <img src=<?= $news_detail['image']?> alt="">
</body>
</html>