<!DOCTYPE html>
<html lang="en">

<?php
include("classes/GetUserData.php");

$userData = new GetUserData();
$result = $userData->getUser();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="icon" href="assets/edit.svg">
    <link rel="stylesheet" href="styles/dashboard.css">
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

<body>
    <section>
        <div class="container d-flex justify-content-end gap-3">
            <a href="add.php" class="text-right add-user text-decoration-none p-3 py-1 bg-black text-white"><i class="fa-solid fa-plus p-2"></i>Add new user</a>
            <a href="login.php" class="logout-user  p-4 py-2 text-center text-decoration-none d-flex align-items-center ">Logout</a>
        </div>

        <?php
        function displayUserData($result)
        {
            if ($result && $result->num_rows > 0) {
                echo "<table class='table mt-5'>
                     <thead>
                         <tr>
                             <th scope='col'>ID</th>
                             <th scope='col'>First Name</th>
                             <th scope='col'>Last Name</th>
                             <th scope='col'>Email</th>
                             <th scope='col'>Address</th>
                             <th scope='col'>Age</th>
                             <th scope='col'>Gender</th>
                             <th scope='col'></th>
                         </tr>
                     </thead>
                     <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                         <td>{$row['id']}</td>
                         <td>{$row['first_name']}</td>
                         <td>{$row['last_name']}</td>
                         <td>{$row['email_address']}</td>
                         <td>{$row['home_address']}</td>
                         <td>{$row['age']}</td>
                         <td>{$row['gender']}</td>
                         <td>
                             <a href='update.php?id={$row['id']}'><img style='width: 12%; height:auto;' src='assets/edit.svg' alt='Edit'></a>
                             <a href='include/delete.include.php?id={$row['id']}'><img style='width: 12%; height:auto;' src='assets/delete.svg' alt='Delete'></a>
                         </td>
                     </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo " <table class='table mt-5'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>First Name</th>
                    <th scope='col'>Last Name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Address</th>
                    <th scope='col'>Age</th>
                    <th scope='col'>Gender</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody>";
            }
        }
        //call the function
        displayUserData($result);
        ?>




        </table>

    </section>
</body>

</html>

<?php



?>