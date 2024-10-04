<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "crudphp";
    private $conn;



    public function __construct()
    {

        $this->connect();
    }


    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // if ($this->conn->connect_error) {
        //     die("Connection error");
        // } else {
        //     echo "Connection succesful";
        // }

        return $this->conn;
    }
}
