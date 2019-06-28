<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>

    <!-- En son derlenmiş ve minimize edilmiş CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="test";
    $conn= new mysqli($severname,$username,$password,$dbname);
    if ($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $datetime=new DateTime();
        $date = $datetime->format("Y-m-d");
        
        $sql= "INSERT INTO blog(title,content,date) VALUES ('$title','$content','$date')";
        if ($conn->query($sql)===TRUE){
            echo "bağlantı başarılı";
        } else {
            echo "bağlantı başarısız:". $conn->error;
        }
        //echo $title;
        //echo $content;
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
    <!-- En son derlenmiş ve minimize edilmiş JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>