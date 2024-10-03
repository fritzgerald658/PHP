<?php

require_once "Dbconn.php";

$host = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";
$conn = "";

$conn = new Database($host, $username, $password, $dbname);
