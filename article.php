<?php
include 'database.php';

class article
{
    private $conn;

    function __construct()
    {
        $database = new database();
        $this->conn = $database->connect();
    }

    function getArticle($articleid)
    {
        $article = array();

        $sorgu = $this->conn->query("SELECT * FROM blog WHERE id=$articleid");
        while ($row = $sorgu->fetch_array()) {
            $article["id"] = $row["id"];
            $article["title"] = $row["title"];
            $article["content"] = $row["content"];
            $article["data"] = $row["date"];
        }

        return $article;
    }

    function getArticles()
    {
        $articles = array();
        $sorgu = $this->conn->query("SELECT * FROM blog ORDER BY date DESC");
        while ($row = $sorgu->fetch_array()) {
            array_push(
                $articles,
                array(
                    "id" => $row["id"],
                    "title" => $row["title"],
                    "content" => $row["content"],
                    "date" => $row["date"]
                )
            );
        }

        return $articles;
    }

    function deleteArticle($articleid)
    {
        $this->conn->query("DELETE FROM comment WHERE article_id =$articleid");
        $this->conn->query("DELETE FROM blog WHERE id=$articleid");
    }
    function createArticle($title, $content, $userid)
    {
        $this->conn->query("INSERT INTO blog(title,content,user_id) VALUES ('$title','$content','$userid')");
    }
    function updateArticle($title, $content, $articleid)
    {

        $this->conn->query("UPDATE blog SET title='$title', content='$content' Where id=$articleid");
    }
    function getArticlesByUserId($userid)
    {
        $articles = array();
        $sorgu = $this->conn->query("SELECT * FROM blog WHERE user_id = $userid ORDER BY date DESC");
        while ($row = $sorgu->fetch_array()) {
            array_push(
                $articles,
                array(
                    "id" => $row["id"],
                    "title" => $row["title"],
                    "content" => $row["content"],
                    "date" => $row["date"]
                )
            );
        }

        return $articles;
    }
}
