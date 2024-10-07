<?php

include("Database.php");
class UserLogin extends Database
{
    private $username;
    private $password;
    private $password_repeat;

    public function __construct($username, $password, $password_repeat)
    {
        $this->username = $username;
        $this->password = $password;
        $this->password_repeat = $password_repeat;
    }

    public function userRegistration()
    {
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_login (username, password) VALUES (?,?);";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param(
            "ss",
            $this->username,
            $password_hash
        );

        $stmt->execute();
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
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($username, $password)) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }
    }

    // form validation or error handling
    public function emptyInput()
    {
        $message = '';
        $result = true;
        if (empty($this->username) || empty($this->password) || empty($this->password_repeat)) {
            $result = false;
            $message = "All input fields are required.";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    public function passwordRepeat()
    {
        $message = '';
        $result = true;
        if ($this->password !== $this->password_repeat) {
            $result = false;
            $message = "Password do not match";
        }

        return [
            'result' => $result,
            'message' => $message
        ];
    }

    // validation for username 
    public function usernameValidation()
    {
        $message = '';
        $result = true;

        $sql = "SELECT * FROM user_login WHERE username = ? LIMIT 1";
        $stmt = parent::connect()->prepare($sql);

        if (!$stmt) {
            die("SQL ERROR " . parent::connect()->error);
        }

        $stmt->bind_param("s", $this->username);
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
}
