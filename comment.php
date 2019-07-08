<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
     if (!isset($_GET['id'])) {
        header("Location:blog.php");
    }

    include 'article.php';
    $articledb = new article();
 include 'commentdb.php';
    $commentdb = new comment();

    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = $_POST['content'];
        $userid = $_SESSION['id'];

        $articleid = $_POST['articleid'];
     $commentdb->createComment($userid,$content,$articleid);
        
    }

    $articleid = $_GET['id'];
    $article = $articledb->getArticle($articleid);

    echo $article["title"] . '</br>';
    echo $article["content"] . '</br>';

    echo '<h3> YORUMLAR </h3></br>';

   
    $comments = $commentdb->getComments($articleid);
    foreach ($comments as $comment) {
        echo $comment["username"] . '</br>';
        echo $comment["content"], '</br>';
    }



    if (isset($_SESSION['id'])) {
        ?>
        <form method="POST" action="comment.php">
            <input type="hidden" name="articleid" value="<?php echo $_GET['id'] ?>">
            <div class="form-group">
                Yorum Ekle: <textarea class="form-control" rows="3" name="content"></textarea>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <button type="submit" class="pull-right">Gönder</button>
                    </div>
                </div>
            </div>
        </form>
    <?php }
    ?>

</body>

</html>