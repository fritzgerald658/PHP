<?php

include "../classes/SendPasswordReset.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

        $reset_password = new SendPasswordReset($email, $token_hash, $expiry, "");
        if ($reset_password->updateToken()) {
            if ($reset_password->sendResetEmail()) {
                header("Location: ../email-sent-notification.php");
            }
        } else {
        }
        echo "Another Error";
    } else {
        echo "execution error";
    }
}
