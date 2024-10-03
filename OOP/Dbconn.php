<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    private function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }
}
