<?php
class comment
{
    private $conn;
    function __construct()
    {
        $database = new database();
        $this->conn = $database->connect();
    }
    function getComments($articleid)
    {
        $comments = array();
        $sorgu = $this->conn->query("SELECT * FROM comment INNER JOIN users ON comment.user_id=users.id WHERE comment.article_id=$articleid");
        while ($row = $sorgu->fetch_array()) {
            array_push(
                $comments,
                array(
                    "id" => $row['id'],
                    "username" => $row['username'],
                    "content" => $row['content']
                    
                )
            );
        }
        return $comments;
    }
    function createComment($userid,$content,$articleid) 
    {
        $this->conn->query("INSERT INTO comment(user_id,content,article_id) VALUES ('$userid','$content','$articleid')");
    }
}
