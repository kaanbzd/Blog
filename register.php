<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Kayıt</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'database.php';
    $database = new database();
    $conn = $database->connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ad = $_POST["ad"];
        $soyad = $_POST["soyad"];
        $kullaniciadi = $_POST["kullanici_adi"];
        $mail = $_POST["mail"];
        $sifre = $_POST["sifre"];

        $sql = "select * from users where username='" . $kullaniciadi . "' or email='" . $mail . "' ";
        $sonuc = $conn->query($sql);
        if ($sonuc->num_rows > 0) {
            echo 'böyle bir kayıt var';
        } else {

            $sql = "INSERT INTO users (name,surname,username,email,password) VALUES('$ad','$soyad','$kullaniciadi','$mail','$sifre')";
            if ($conn->query($sql)) {
                echo "kayıt başarılı";
            } else {
                echo "kayıt başarısız:" . $conn->error;
            }
        }
    }

    ?>
    <form action="register.php" method="POST">
        AD <input type="text" name="ad" /></br>
        SOYAD <input type="text" name="soyad" /></br>
        KULLANICI ADI <input type="text" name="kullanici_adi" /></br>
        E POSTA <input type="email" name="mail" /></br>
        ŞİFRE <input type="password" name="sifre" />
        <input type="submit" value="Submit">
    </form>
</body>

</html>