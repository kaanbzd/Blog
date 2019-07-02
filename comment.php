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
    session_start();
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($severname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = $_POST['content'];
        $userid = $_SESSION['id'];

        $articleid = $_POST['articleid'];

        $sql = "INSERT INTO comment(content,user_id,article_id) VALUES ('$content',$userid,$articleid)";

        if ($conn->query($sql) === TRUE) {
            echo "yorum eklendi";
        } else {
            echo "yorum ekleme başarısız:" . $conn->error;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];
        $sorgu = $conn->query("SELECT * FROM blog WHERE id=$id");
        while ($row = $sorgu->fetch_array()) {
            $title = $row['title'];
            $content = $row['content'];
        }
        echo $title . '</br>';
        echo $content . '</br>';

        echo '<h3> YORUMLAR </h3></br>';

        $sorgu = $conn->query("SELECT * FROM comment INNER JOIN users ON users.id=comment.user_id WHERE article_id=$id");
        while ($row = $sorgu->fetch_array()) {
            echo  $row['content'] . '</br>';
            echo $row['username'] . '</br>';
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
    } ?>

</body>

</html>