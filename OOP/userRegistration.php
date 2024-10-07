<!DOCTYPE html>
<html lang="en">
<?php
include "include/signup.include.php"
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['msg'])) {
        $message = urldecode($_GET['msg']);
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    ?>
    <form action="include/signup.include.php" method="post">
        <input name="username" type="text" placeholder="Username"> <br>
        <input name="password" type="text" placeholder="Password">
        <input name="password-repeat" type="text" placeholder="Confirm Password">
        <button name="submit" type="submit">Submit</button>
    </form>
</body>

</html>