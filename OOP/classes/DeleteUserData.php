<?php

include("Database.php");

class DeleteUserData extends Database
{
    public function deleteData($id)
    {
        $sql = "DELETE FROM user_registration WHERE id = ? ";
        $stmt = parent::connect()->prepare($sql);

        if (!$stmt) {
            die("Preparation failed" . parent::connect()->error);
        }

        $stmt->bind_param("i", $id);


        $stmt->execute();
    }
}
