<?php

include "../classes/SendPasswordReset.php";

if (isset($_POST['submit'])) {
    $new_password = $_POST['password'];
    $password_repeat = $_POST['confirm-password'];
    $token = $_POST['token'];

    $update_password = new SendPasswordReset("", $token, "", $new_password);
    if ($update_password->sendNewPassword()) {
        header("Location: ../login.php");
    }
} else {
    echo "Execution error";
}
