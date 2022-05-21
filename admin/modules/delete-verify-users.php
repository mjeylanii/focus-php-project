<?php
include('config.php');
if (isset($_GET["delete"])) {
    $users_id = $_GET["id"];
    if ($_GET['delete'] == 1) {
        $users_id = $_GET["id"];
        if ($users_id != 0) {
            $result = $conn->exec("DELETE FROM users WHERE user_id='$users_id'");
            if ($result > 0) {
                header("location:http://localhost/focus/admin/index.php?selection=4");
                echo '<script>alert("User deleted");</script>';
            } else {
                echo "User was not deleted";
            }
        }
    } else {
        $result = $conn->exec("UPDATE  users SET user_status='VERIFIED' WHERE user_id='$users_id'");
        if ($result > 0) {
            echo 'User verified';
        } else {
            echo 'User not verified';
        }
    }
}
