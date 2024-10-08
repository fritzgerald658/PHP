<?php

include __DIR__ . "/../classes/DeleteUserData.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_user = new DeleteUserData();
    if ($delete_user->deleteData($id)) {
        echo "Error";
    } else {
        header("Location: ../dashboard.php");
        exit();;
    }
}
