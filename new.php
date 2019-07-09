<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $userid = $_SESSION['id'];
        include 'article.php';
        $article = new article();
        $article->createArticle($title, $content, $userid);
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
                        <?php
                        if (isset($_SESSION["id"])) {
                            echo '<li><a href="admin.php">Admin</a></li>';
                            echo '<li><a href="logout.php">Çıkış</a></li>';
                        } else {
                            header("Location:blog.php");
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="new.php">
            <div class="row">
                <div class="col-md-4">Başlık</div>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Text input" name="title">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">İçerik</div>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <button type="submit" class="pull-right">Ekle</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>