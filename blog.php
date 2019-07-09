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
					<li class="active"><a href="blog.php">Listele</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					session_start();
					if (isset($_SESSION["id"])) {
						echo '<li><a href="table.php">Admin</a></li>';
						echo '<li><a href="logout.php">Çıkış</a></li>';
					} else {
						echo '<li><a href="login.php">Giriş</a></li>';
						echo '<li><a href="register.php">Üye Ol</li>';
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