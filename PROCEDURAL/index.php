<?php
include("include/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="icon" href="assets/edit.svg">
    <link rel="stylesheet" href="styles/index.css">
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
        <div class="container d-flex justify-content-end">
            <a href="add.php" class="text-right add-user text-decoration-none p-4 py-2 bg-black text-white"><i class="fa-solid fa-plus p-2"></i>Add new user</a>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `user_registration`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['email_address'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id'] ?>"><img style="width: 12%; height:auto;" src="assets/edit.svg" alt=""></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>"><img style="width: 12%; height:auto;" src="assets/delete.svg" alt=""></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </section>
</body>

</html>

<?php



?>