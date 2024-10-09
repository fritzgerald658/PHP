<!DOCTYPE html>
<html lang="en">


<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Data</title>
        <link rel="icon" href="assets/edit.svg">
        <link rel="stylesheet" href="styles/login.css">
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

<body class="d-flex justify-content-center flex-column align-items-center">

    <div>

        <?php
        if (isset($_GET['msg'])) {
            $message = $_GET['msg'];
            echo "<div class='alert alert-success alert-dismissible fade show m-0' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        ?>
        <header class="d-flex justify-content-center">
            <h4>Login your account</h4>
        </header>
        <form action="include/login.include.php" method="post">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="content">
                        <label for="username">Username</label>
                        <input name="username" class="px-3 py-1" type="text" placeholder="Username" value="<?php echo isset($_GET['username']) ?  htmlspecialchars($_GET['username']) : ""; ?>">
                    </div>
                    <div class="content">
                        <label for="password">Password</label>
                        <input name="password" class="px-3 py-1" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="container-fluid p-0 d-flex gap-2 flex-column justify-content-center">
                    <button id="btn-submit" class="py-1" name="submit" type="submit">Login</button>
                    <p class="my-0">Don't have an account? <a href="userRegistration.php" class="login-account">Register</a></p>
                    <a href="send-email.php" class="login-account">Forgot password</a>
                </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>