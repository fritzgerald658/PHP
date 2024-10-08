<?php

include "../classes/SendPasswordReset.php";

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    $update_password = new SendPasswordReset("", "", "", $new_password);
    if ($update_password->sendNewPassword($new_password)) {
        header("Location: ../login.php");
    }
}
