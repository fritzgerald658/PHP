<?php

include "Database.php";

// $db = new Database();
// $conn = $db->connect();

class UserData extends Database
{
    private $first_name;
    private $last_name;
    private $email_address;
    private $home_address;
    private $age;
    private $gender;

    public function __construct($first_name, $last_name, $email_address, $home_address, $age, $gender)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email_address = $email_address;
        $this->home_address = $home_address;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function addUser()
    {
        $query = "INSERT INTO user_registration (first_name,last_name,email_address,home_address,age,gender)
        VALUES (?,?,?,?,?,?);";
        $stmt = parent::connect()->prepare($query);
        if (!$stmt) {
            die("Preparation failed" . parent::connect()->error);
        }

        $stmt->bind_param(
            "ssssis",
            $this->first_name,
            $this->last_name,
            $this->email_address,
            $this->home_address,
            $this->age,
            $this->gender
        );


        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
