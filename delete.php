<?php
    $articleid = $_GET['id'];
    include 'article.php';
    $article = new article ();
    $article->deleteArticle($articleid);
    header("Location:blog.php") ;
?>

