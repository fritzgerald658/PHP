<?php

include "../classes/SendPasswordReset.php";
include "../classes/UserValidation.php";

if (isset($_POST['submit'])) {
    $new_password = $_POST['password'];
    $password_repeat = $_POST['confirm-password'];
    $token = $_POST['token'];

    $update_password = new SendPasswordReset("", $token, "", $new_password);
    // check if the password and confirm password field have the same values
    $password_validation = new UserValidation();
    $password_check = $password_validation->passwordRepeat($new_password, $password_repeat, "");
    if (!$password_check['result']) { // if the password fields doesn't have the same values
        $message = $password_check['message'];
        header("Location: ../reset-password.php?msg=" . urlencode($message) . '&token=' . urlencode($token));
        exit();
    } else {
        if ($update_password->sendNewPassword()) {
            header("Location: ../login.php?success-msg=Your password has been changed. Login now!");
            exit();
        } else {
            echo "Password update error";
        }
    }
} else {
    echo "Execution error";
}
