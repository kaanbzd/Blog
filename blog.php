<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Blog</title>

	<!-- En son derlenmiş ve minimize edilmiş CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">

			<!-- Aç/kapa için nav kısayollarını, formu ve diğer içeriği bir araya topla -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="new.php">Ekle <span class="sr-only">(current)</span></a></li>
					<li class="active"><a href="blog.php">Listele</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Ara">
							</div>
							<button type="submit" class="btn btn-default">Gönder</button>

						</form>
					</li>
					<?php
					session_start();
					if (isset($_SESSION["id"])) {
						echo '<li><a href="logout.php">Çıkış</a></li>';
					} else {
						echo '<li><a href="login.php">Giriş</a></li>';
					}
					?>
				</ul>
			</div><!-- /.navbar-aç/kapa -->
		</div><!-- /.container-fluid -->
	</nav>

	<?php
	/*try {
		/$db = new PDO("mysql:host=localhost;dbname=test", "root", "");
		echo "Bağlantı Başarılı.";
	} catch (PDOException $e) {
		echo "Bir Hata Oluştu: " . $e->getMessage();
	}

	$sorgu = $db->query("select * from blog");

	if ($sorgu->rowCount() > 0) {
		while ($article = $sorgu->fetch()) {
			echo '<div class="row">';
			echo '<div class="col-md-12">';
			echo '<div class="panel panel-default">';
			echo '<div class="panel-heading">';
			echo '<h3 class="panel-title">' . $article['title'] . '</h3>';
			echo '</div>';
			echo '<div class="panel-body">';
			echo $article['content'];
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	} else {
		echo "Hiç Veri Bulunamadı.";
	}
*/

	$db = new mysqli("localhost", "root", "", "test");
	if ($db->connect_error) {
		die("hata " . $db->connect_error);
	}
	$sql = "select * FROM blog";
	$result = $db->query($sql);

	while ($row = $result->fetch_assoc()) {
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<div class="panel panel-default"">';
		echo '<div class="panel-heading"><a class="btn btn-default" href="update.php?id=' . $row['id'] . '" role="button">Güncelle</a>';
		echo '<a class="btn btn-default" href="delete.php?id=' . $row['id'] . '" role="button">Sil</a>';
		echo '<h3 class="panel-title"><a href="comment.php?id=' . $row['id'] . '"> ' . $row['title'] . ' </a></h3>';
		echo '</div>';
		echo '<div class="panel-body">';
		echo $row['content'];
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}


	?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- En son derlenmiş ve minimize edilmiş JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>