<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection error");
        } else {
            echo "Connection succesful";
        }

        return $this->conn;
    }
}
$host = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";
$conn = '';


$db = new Database($host, $username, $password, $dbname);
