<?php
include __DIR__ . "/../classes/UserLogin.php";

$error_msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];


    $user_registration = new UserLogin($username, $password, $password_repeat);

    $empty_check = $user_registration->emptyInput();
    $username_check = $user_registration->usernameValidation();
    $password_check = $user_registration->passwordRepeat();

    // form validation
    if (!$empty_check['result']) { // check for empty inputs
        $message = $empty_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    } else if (!$username_check['result']) { // check if the username already exist
        $message = $username_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    } else if (!$password_check['result']) { // check if both password fields contains the same value
        $message = $password_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message));
        exit();
    } else {
        // if the form has valid inputs
        if ($user_registration->userRegistration()) {
            die("Error");
        } else {
            header('Location: ../index.php');
            exit();
        }
    }
}
