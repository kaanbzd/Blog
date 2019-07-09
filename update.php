<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>update</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'article.php';
    $articledb = new article();

    $articleid = $_GET['id'];
    $article = $articledb->getArticle($articleid);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $articledb->updateArticle($title, $content, $articleid);
        header("Location:blog.php");
    }
    ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="blog.php">Listele</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="update.php?id=<?php echo $articleid; ?>">
            <div class="row">
                <div class="col-md-4">Başlık Güncelle</div>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Text input" name="title" VALUE="<?php echo $article["title"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">İçerik Güncelle</div>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="content"><?php echo $article["content"]; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button type="submit" class="pull-right">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>