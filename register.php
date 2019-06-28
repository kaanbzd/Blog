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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ad = $_POST["ad"];
        $soyad = $_POST["soyad"];
        $kullaniciadi = $_POST["kullanici_adi"];
        $mail = $_POST["mail"];
        $sifre = $_POST["sifre"];
        $sql= "INSERT INTO blog(name,surname,email,username,password) VALUES('$ad','$soyad','$kullaniciadi','$mail','$sifre')";
        if ($conn->query($sql)){
            echo "kayıt başarılı";
        } else {
            echo "kayıt başarısız:". $conn->error;
    }
}
    
    ?>
    <form action=”” method=”POST”>
        <input type=”text” name=”ad” />
        <input type=”text” name=”soyad” />
        <input type=”text” name=”kullanici_adi” />
        <input type=”email” name=”mail” />
        <input type=”password” name=”sifre” />
        <input type=”button” value=”Kaydol” />
    </form>
</body>

</html>