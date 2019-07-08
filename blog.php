<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Blog</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">


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
			</div>
		</div>
	</nav>

	<?php

	include 'article.php';
	$articledb = new article();
	$articles = $articledb->getArticles();
	foreach ($articles as $article) {
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<div class="panel panel-default"">';
		echo '<div class="panel-heading"><a class="btn btn-default" href="update.php?id=' . $article['id'] . '" role="button">Güncelle</a>';
		echo '<a class="btn btn-default" href="delete.php?id=' . $article['id'] . '" role="button">Sil</a>';
		echo '<h3 class="panel-title"><a href="comment.php?id=' . $article['id'] . '"> ' . $article['title'] . ' </a></h3>';
		echo '</div>';
		echo '<div class="panel-body">';
		echo $article['content'];
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}


	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>