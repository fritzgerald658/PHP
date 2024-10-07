<?php

include "Database.php";
class UpdateUserData extends Database
{

    private $first_name;
    private $last_name;
    private $email_address;
    private $home_address;
    private $age;
    private $gender;
    private $id;

    public function __construct($first_name, $last_name, $email_address, $home_address, $age, $gender, $id)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email_address = $email_address;
        $this->home_address = $home_address;
        $this->age = $age;
        $this->gender = $gender;
        $this->id = $id;
    }
    public function updateUserData()
    {
        $sql = "UPDATE user_registration SET first_name = ?, last_name = ?, email_address = ?, home_address = ?, age = ?, gender = ? 
            WHERE id = ?";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param(
            "ssssisi",
            $this->first_name,
            $this->last_name,
            $this->email_address,
            $this->home_address,
            $this->age,
            $this->gender,
            $this->id
        );

        $stmt->execute();
        $stmt->close();
    }

    public function retainFormValues($id)
    {
        $sql = "SELECT * FROM user_registration WHERE id = ? LIMIT 1";
        $stmt = parent::connect()->prepare($sql);
        if (!$stmt) {
            die("Preparation failed" . parent::connect()->error);
        }

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
