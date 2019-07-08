<?php

class database
{
    private $host;
    private $user;
    private $password;
    private $dbname;

    function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbname = "test";
    }
    function connect()
    {
        return new mysqli($this->host, $this->user, $this->password, $this->dbname);
    }
}
