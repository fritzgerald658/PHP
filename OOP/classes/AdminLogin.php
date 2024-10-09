<?php

include "Database.php";

class AdminLogin extends Database
{

    private $username;
    private $password;

    public function adminLogin($username, $password)
    {
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                session_start();

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }
        return false;
    }
}
