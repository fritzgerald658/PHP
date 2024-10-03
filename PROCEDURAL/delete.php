<?php
include("include/database.php");
$id = $_GET['id'];
$sql = "DELETE FROM `user_registration` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: index.php");
}
