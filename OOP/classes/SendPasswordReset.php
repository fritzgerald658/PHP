<?php
include "Database.php";
require __DIR__ . "/../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendPasswordReset extends Database
{

    private $email;
    private $token_hash;
    private $expiry;
    private $new_password;

    public function __construct($email, $token_hash, $expiry, $new_password)
    {
        $this->email = $email;
        $this->token_hash = $token_hash;
        $this->expiry = $expiry;
        $this->new_password = $new_password;
    }

    public function updateToken()
    {
        $sql = "UPDATE user_login SET reset_token_hash = ? , reset_token_expire = ? WHERE email = ?";
        $stmt = parent::connect()->prepare($sql);

        if (!$stmt) {
            echo "Error" . parent::connect()->error;
        }

        $stmt->bind_param(
            "sss",
            $this->token_hash,
            $this->expiry,
            $this->email
        );

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            $stmt->close();
            return true; // Token update successful
        } else {
            $stmt->close();
            return false; // No rows affected or execution failed
        }
    }


    public function sendResetEmail()
    {
        // Load PHPMailer classes and try to send the email
        $phpmailer = new PHPMailer();

        try {
            // SMTP configuration
            //$phpmailer->SMTPDebug = SMTP::DEBUG_SERVER; // For detailed debugging
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io'; // Replace with your SMTP server
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '7b2dcb5483975b'; // Replace with your Mailtrap username
            $phpmailer->Password = 'f119479c169de0';   // Replace with your Mailtrap password

            // Email settings
            $phpmailer->setFrom('noreply@yourdomain.com', 'Your Website');
            $phpmailer->addAddress($this->email); // Send to the user's email
            $phpmailer->Subject = 'Password Reset Request';
            $phpmailer->Body = "Please click the link below to reset your password:\n\n";
            $phpmailer->Body .= "http://localhost/php/oop/reset-password.php?token=" . $this->token_hash;

            // Send the email
            if ($phpmailer->send()) {
                return true; // Email successfully sent
            } else {
                throw new Exception('Email could not be sent.');
            }
        } catch (Exception $e) {
            echo "Mailer Error: " . $phpmailer->ErrorInfo;
            return false; // Return false if email sending fails
        }
    }

    // function for updating new password after forgot password process
    public function sendNewPassword()
    {
        $password_hash = password_hash($this->new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE user_login SET password = ? WHERE reset_token_hash = ? ";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bind_param(
            "ss",
            $password_hash,
            $this->token_hash
        );

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }

        $stmt->close();
    }
}
