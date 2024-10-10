<?php
session_start();
require_once '/laragon/www/PHP/vendor/autoload.php';

use Facebook\Facebook;

$fb = new Facebook([
    'app_id' => '723701066645256',
    'app_secret' => '5802d3cf7ee633677d940e1055e490fd',
    'default_graph_version' => 'v12.0',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/PHP/OOP/dashboard.php/', $permissions);

if (isset($_SESSION['login-url'])) {
    header("Location: ../userRegistration");
    exit();
}
