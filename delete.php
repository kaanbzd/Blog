<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>Page Title</title>
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

    $id = $_GET['id'];
    if ($conn->query("DELETE FROM blog Where id=$id")) {
        echo 'SİLİNDİ';
    } else echo 'hata';
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

</body>

</html>