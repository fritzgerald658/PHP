<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once '/laragon/www/PHP/vendor/autoload.php';
include "include/google-callback.include.php";

if (!isset($_SESSION['username'])) {
    header("Location: PHP/OOP/login.php");
} else {
    $username = $_SESSION['username'];
}

if (isset($_GET['error']) && $_GET['error'] === 'access_denied') {
    // The user denied the request, handle this case
    header("Location: http://localhost/PHP/OOP/userRegistration.php?error=You+denied+the+login+request");
    exit();
}

if (isset($_GET['scope'])) {
    $scope =  $_GET['scope'];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
</head>

<body class="m-4">
    <a href="/PHP/OOP/admin-login.php" class="btn btn-primary">Admin Login</a>
    <a href="/PHP/OOP/include/logout.include.php" class="btn btn-primary">Logout</a>
    <section class="d-flex justify-content-center align-items-center">
        <h1>WELCOME! <?php echo htmlspecialchars($username) ?></h1>
    </section>
</body>

</html>