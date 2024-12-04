<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center">Tin tức TLU những ngày qua</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news_block p-3">
                    <?php
                    $linkdetail = 'index.php?action=newsdetail&id=';
                    foreach ($list_categories as $categoryvalue) {
                        echo '<div class="card mb-3">';
                        echo '<div class="card-header bg-secondary text-white">';
                            echo $categoryvalue['name'];
                        echo '</div>';
                        echo '<div class="card-body">';
                            foreach ($list_news as $newsvalue) {
                                if ($newsvalue["category_id"] == $categoryvalue["id"]) {
                                    echo '<a href="' . $linkdetail . $newsvalue['id'] . '" class="card-link text-decoration-none">';
                                    echo $newsvalue["title"];
                                    echo '</a>';
                                }
                            }
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>