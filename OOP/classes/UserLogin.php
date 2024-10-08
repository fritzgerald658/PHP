<?php

include "Database.php";

class UserLogin extends Database
{
    private $username;
    private $email;
    private $password;
    private $password_repeat;

    public function userRegistration($username, $email, $password, $password_repeat)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->password_repeat = $password_repeat;

        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_login (username, email, password) VALUES (?,?,?);";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param(
            "sss",
            $this->username,
            $this->email,
            $password_hash
        );

        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }

    // this will handle the login function of the app
    public function userLogin($username, $password)
    {
        $sql = "SELECT * FROM user_login WHERE username = ?";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param(
            "s",
            $username
        );

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['admin'] = ($user['role'] === "admin");
                return true;
            }
        }
        return false;
    }

    public function userLogout()
    {
        session_start();
        session_destroy();
    }

    // validation if username already exist
    public function usernameExistValidation($username)
    {
        $message = '';
        $result = true;

        $sql = "SELECT * FROM user_login WHERE username = ? LIMIT 1";
        $stmt = parent::connect()->prepare($sql);

        if (!$stmt) {
            die("SQL ERROR " . parent::connect()->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result_set = $stmt->get_result();

        if ($result_set->num_rows > 0) {
            $result = false;
            $message = "Username already exist";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    //validation if email already exist
    public function emailExistValidation($email)
    {
        $message = '';
        $result = true;

        $sql = "SELECT * FROM user_login WHERE email = ? LIMIT 1";
        $stmt = parent::connect()->prepare($sql);

        if (!$stmt) {
            die("SQL ERROR " . parent::connect()->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result_set = $stmt->get_result();

        if ($result_set->num_rows > 0) {
            $result = false;
            $message = "Email already exist";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    public function usernameFoulCharacters($username)
    {
        $message = '';
        $result = true;

        if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $message = "Special characters are not allowed";
            $result = false;
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    public function sendNewPassword($password)
    {
        $sql = "UPDATE user_login SET password = ? WHERE email = ? ";
    }
}
