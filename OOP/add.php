<!DOCTYPE html>
<html lang="en">
<?php


require_once("classes/UserData.php");

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $home_address = $_POST['home_address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];


    $addUser = new UserData($first_name, $last_name, $email_address, $home_address, $age, $gender);

    if ($addUser->addUser()) {
        header("Location: index.php");
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="icon" href="assets/edit.svg">
    <link rel="stylesheet" href="styles/addUser.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>


<body class="d-flex justify-content-center flex-column align-items-center">

    <section class="forms-container py-5">
        <header class="d-flex justify-content-center">
            <h2>Registration</h2>
        </header>
        <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="content">
                        <label for="first_name">First Name</label>
                        <input name="first_name" class="px-3 py-1" type="text" placeholder="e.g Juan">
                    </div>
                    <div class="content">
                        <label for="email_address">Email Address</label>
                        <input name="email_address" class="px-3 py-1" type="email" placeholder="example@gmail.com">
                    </div>
                    <div class="content">
                        <label for="home_address">Address</label>
                        <input name="home_address" class="px-3 py-1" type="text" placeholder="e.g Zambales">
                    </div>
                </div>
                <div class="col-6">
                    <div class="content">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" class="px-3 py-1" type="text" placeholder="e.g Cruz">
                    </div>
                    <div class="content">
                        <label for="age">Age</label>
                        <input name="age" class="px-3 py-1" type="number" min="13" placeholder="18">
                    </div>
                    <div class="radio-content">
                        <fieldset>
                            <legend class="form-label">Gender:</legend>
                            <div class="container d-flex gap-5">
                                <div class="form-check">
                                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input" required>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input" required>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0 d-flex gap-2 flex-column justify-content-center">
                <button id="btn-submit" class="py-1 " name="submit" type="submit">Register</button>
                <a href="index.php" class=" text-decoration-none py-1 text-center">Cancel</a>
            </div>
        </form>
    </section>

</body>

</html>