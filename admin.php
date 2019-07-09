<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="blog.php">Listele</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    session_start();
                    if (isset($_SESSION["id"])) {
                        echo '<li><a href="admin.php">Admin</a></li>';
                        echo '<li><a href="logout.php">Çıkış</a></li>';
                    } else {
                        header("Location:blog.php");
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include 'article.php';
    $article = new article();
    $userid = $_SESSION['id'];
    $articles = $article->getArticlesByUserId($userid);
    ?>

    <a class="btn btn-default" href="new.php" role="button">New</a>
    <table class="table table-striped">
        <tr>
            <td> id </td>
            <td> title </td>
            <td> date </td>
            <td> action </td>
        </tr>
        <?php
        foreach ($articles as $article) {
            echo '<tr>';
            echo '<td>' . $article['id'] . '</td>';
            echo '<td>' . $article['title'] . ' </td>';
            echo '<td>' . $article['date'] . ' </td>';
            echo '<td><a href ="update.php?id=' . $article['id'] . '">Güncelle </a><a href="delete.php?id=' . $article['id'] . '">Sil</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>