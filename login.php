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
                header("location:blog.php");
            }
        } else {
            $_SESSION["giris"] = "BAŞARISIZ";
        }
        echo '<br> GİRİŞ ' . $_SESSION["giris"];
    }
    ?>
</body>

</html>