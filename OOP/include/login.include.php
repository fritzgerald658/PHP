<?php

include "../classes/UserLogin.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        header('Location: ../login.php?msg=All inputs are required');
        exit();
    } else {
        $user_login = new UserLogin();
    }

    if ($user_login->userLogin($username, $password)) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        header('Location: ../login.php?msg=Username or password is incorrect');
        exit();
    }
}
