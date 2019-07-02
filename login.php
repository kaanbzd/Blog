<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Kayıt</title>
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

    ?>
    <form action="login.php" method="POST">
        <table align="center">
            <tr>
                <td>Kullanici Adi</td>
                <td>:</td>
                <td><input type="text" name="kullaniciadi"></td>
            </tr>
            <tr>
                <td>Sifre</td>
                <td>:</td>
                <td><input type="password" name="sifre"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Giris"></td>
            </tr>
        </table>
    </form>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kadi = $_POST['kullaniciadi'];
        $sifre = $_POST['sifre'];
        $sql = "select * from users where username='" . $kadi . "' and password='" . $sifre . "' ";
        $sonuc = $conn->query($sql);
        if ($sonuc->num_rows > 0) {
            while ($user = $sonuc->fetch_assoc()) {
                $_SESSION["id"] = $user["id"];
                header ("location:blog.php");
            }
            //Eğer var ise BAŞARILI komutunu veriyoruz.
            
        } else {
            //Eğer yok ise BAŞARISIZ komutunu veriyoruz.
            $_SESSION["giris"] = "BAŞARISIZ";
        }
        //Son olarak ekrana giriş durumunu yazdırıyoruz.
        echo '<br> GİRİŞ ' . $_SESSION["giris"];
    }



    /*if (mysql_num_rows($sql_check)) {
        $_SESSION["login"] = "true";
        $_SESSION["user"] = $kadi;
        header("Location:blog.php");
        } else {
        if ($kadi == "" or $sifre == "") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
        } else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
        }
        }*/
    ?>
</body>
</html>