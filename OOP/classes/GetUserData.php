<?php
include "Database.php";
class GetUserData extends Database
{
    private $first_name;
    private $last_name;
    private $email_address;
    private $home_address;
    private $age;
    private $gender;

    public function getUser()
    {
        $sql = "SELECT * FROM user_registration";
        $result = parent::connect()->query($sql);
        return $result;
    }
}
