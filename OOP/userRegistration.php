<!DOCTYPE html>
<html lang="en">

<?php

include "include/facebook-callback.include.php";
include "include/signup.include.php";

if (isset($_SESSION['login-url'])) {
    $loginUrl = $_SESSION['login-url'];
}
?>

<?php
include "include/google-callback.include.php";

if (isset($_SESSION['google_sign_in'])) {
    $google_sign_in = $_SESSION['google_sign_in'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/userRegistration.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

<body style="height:100vh;" class="d-flex justify-content-center flex-column align-items-center">

    <div>

        <?php
        if (isset($_GET['msg'])) {
            $message = urldecode($_GET['msg']);
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        ?>
        <header class="d-flex justify-content-center">
            <h4>Register an account</h4>
        </header>
        <form action="include/signup.include.php" method="post">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="content">
                        <label for="username">Username</label>
                        <input name="username" class="px-3 py-1" type="text" placeholder="Username" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ""; ?>">
                    </div>
                    <div class="content">
                        <label for="email">Email</label>
                        <input name="email" class="px-3 py-1" type="email" placeholder="Email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ""; ?>">
                    </div>
                    <div class="content">
                        <label for="password">Password</label>
                        <input name="password" class="px-3 py-1" type="password" placeholder="Password">
                    </div>
                    <div class="content">
                        <label for="password-repeat">Confirm Password</label>
                        <input name="password-repeat" class="px-3 py-1" type="password" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="container-fluid p-0 d-flex gap-2 flex-column justify-content-center">
                    <button id="btn-submit" class="py-1" name="submit" type="submit">Register</button>
                    <a href="<?php echo htmlspecialchars($google_sign_in) ?>" id="btn-submit" class="py-1  text-decoration-none bg-white text-black d-flex align-items-center justify-content-center gap-3" name="submit" type="submit"><i class="fa-brands fa-google"></i>Sign up with Google</a>
                    <a href="<?php echo htmlspecialchars($loginUrl) ?>" id="btn-submit" class="py-1  text-decoration-none bg-white text-black d-flex align-items-center justify-content-center gap-3" name="submit" type="submit"><i class="fa-brands fa-facebook"></i>Sign up with Facebook</a>
                    <p>Have an account? <a href="login.php" class=" login-account">Login</a></p>
                </div>
        </form>
    </div>
</body>

</html>