<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>News Manager</h3>
        <a href="index.php?action=add" class="btn btn-success">Add News</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Create at</th>
                <th scope="col">Category</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($newslist as $news):?>
                <tr>
                    <td><?= $news->getTitle()?></td>
                    <td><?= $news->getContent()?></td>
                    <td><img src="<?= $news->getImage()?>" width="100px"></td>
                    <td><?= $news->getCreate_at()?></td>
                    <td><?= $news->getCategory_id()?></td>
                    <td><a href="index.php?action=edit&index=<?= $news->getId()?>" class="btn btn-success">Edit</a></td>
                    <td><a href="index.php?action=delete&index=<?= $news->getId()?>" class="btn btn-primary">Delete</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
