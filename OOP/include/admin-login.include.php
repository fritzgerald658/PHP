<?php

include "../classes/UserLogin.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        header('Location: ../admin-login.php?msg=All inputs are required' . '&username=' . urlencode($username));
        exit();
    } else {
        $user_login = new UserLogin();
    }

    if ($user_login->userLogin($username, $password)) {
        if ($_SESSION['admin']) {
            header("Location: ../data-tables.php");
            exit();
        } else {
            header('Location: ../admin-login.php?msg=You are not an admin');
            exit();
        }
    } else {
        header('Location: ../admin-login.php?msg=Username or password is incorrect' . '&username=' . urlencode($username));
        exit();
    }
}
