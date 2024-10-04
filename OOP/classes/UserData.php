<?php

class UserData extends Database
{
    private $first_name;
    private $last_name;
    private $email_address;
    private $address;
    private $age;
    private $gender;

    public function __construct($first_name, $last_name, $email_address, $address, $age, $gender)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email_address = $email_address;
        $this->address = $address;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function addUser()
    {
        $query = "INSERT INTO user_registration ('first_name','last_name','email_address','address','age','gender')
        VALUES (:first_name,:last_name,:email_address,:address,:age,:gender)";
        $stmt = parent::connect()->prepare($query);
        $stmt->bind_param(
            "ssssis",
            $this->first_name,
            $this->last_name,
            $this->email_address,
            $this->address,
            $this->age,
            $this->gender
        );

        $stmt->execute();
    }
}
