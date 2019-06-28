<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>update</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    $conn = new mysqli($severname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];
    $sorgu = $conn->query("SELECT * FROM blog WHERE id=$id");
    while ($row = $sorgu->fetch_array()) {
        $title = $row['title'];
        $content = $row['content'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updatetitle = $_POST['title'];
        $updatecontent = $_POST['content'];
        if ($conn->query("UPDATE blog SET title='$updatetitle', content='$updatecontent' Where id=$id")) {
            echo 'GÜNCELLENDİ';
        } else echo 'hata';
    }
    ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Aç/kapa için nav kısayollarını, formu ve diğer içeriği bir araya topla -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="new.php">Ekle <span class="sr-only">(current)</span></a></li>
                    <li><a href="blog.php">Listele</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Ara">
                                </div>
                                <button type="submit" class="btn btn-default">Gönder</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-aç/kapa -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <div class="row">
                <div class="col-md-4">Başlık Güncelle</div>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Text input" name="title" VALUE="<?php echo $title; ?>">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">İçerik Güncelle</div>
                <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="content"><?php echo $content; ?></textarea>
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