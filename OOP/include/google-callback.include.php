<?php

require_once '/laragon/www/PHP/vendor/autoload.php';

use Google\Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;

// init configuration
$clientID = '387192750275-7cc6b06ttmt1jd6uod2p85ksl20bf73d.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/PHP/OOP/dashboard.php/';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    $client->setPrompt('consent');

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    if (isset($_SESSION['username'])) {
        header("Location: ../dashboard.php");
        exit();
    }
} else {
    $google_sign_in = $client->createAuthUrl();

    if (isset($_SESSION['google_sign_in'])) {
        header("Location: ../userRegistration");
    }
}
