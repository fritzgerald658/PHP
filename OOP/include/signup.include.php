<?php
include __DIR__ . "/../classes/UserValidation.php";
include __DIR__ . "/../classes/UserLogin.php";
$error_msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    $user_registration = new UserLogin();
    $user_validation = new UserValidation();


    // check for empty inputs
    $empty_check = $user_validation->emptyInput($username, $password, $password_repeat, $email);
    if (!$empty_check['result']) {
        $message = $empty_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }


    // check if the username already exist
    $username_exist = $user_registration->usernameExistValidation($username);
    if (!$username_exist['result']) {
        $message = $username_exist['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }

    // check if the username contains special characters
    $username_check = $user_registration->usernameFoulCharacters($username);
    if (!$username_check['result']) {
        $message = $username_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }

    // check if the email already exist
    $email_check = $user_registration->emailExistValidation($email, $username);
    if (!$email_check['result']) {
        $message = $email_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }


    // check if the password has atleast 8 characters long
    $password_requirements = $user_validation->passwordRequirements($password, $username);
    if (!$password_requirements['result']) {
        $message = $password_requirements['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }


    // check if the password have the same values
    $password_check = $user_validation->passwordRepeat($password, $password_repeat, $username);
    if (!$password_check['result']) { // check if both password fields contains the same value
        $message = $password_check['message'];
        header('Location: ../userRegistration.php?msg=' . urlencode($message) . '&username=' . urlencode($username));
        exit();
    }

    // if the form has valid inputs
    $registration_result = $user_registration->userRegistration($username, $email, $password, $password_repeat,);
    if ($registration_result === true) {
        header('Location: ../dashboard.php');
        exit();
    } else {
        die("Error");
    }
}
