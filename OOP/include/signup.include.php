<?php
include __DIR__ . "/../classes/UserLogin.php";

$error_msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];


    $user_registration = new UserLogin();
    $user_registration->userRegistration($username, $password, $password_repeat);



    // check for empty inputs
    $empty_check = $user_registration->emptyInput($username, $password, $password_repeat);
    if (!$empty_check['result']) {
        $message = $empty_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    }


    // check if the username already exist
    $username_check = $user_registration->usernameValidation($username);
    if (!$username_check['result']) {
        $message = $username_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    }

    $password_check = $user_registration->passwordRepeat($password, $password_repeat);
    if (!$password_check['result']) { // check if both password fields contains the same value
        $message = $password_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    }

    // if the form has valid inputs
    $registration_result = $user_registration->userRegistration($username, $password, $password_repeat);
    if ($registration_result === true) {
        header('Location: ../index.php');
        exit();
    } else {
        die("Error");
    }
}
