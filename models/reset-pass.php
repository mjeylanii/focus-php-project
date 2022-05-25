<?php
$pass = md5($_POST["pass"]);
$userId =  $_SESSION['user'];
if ($sifre != NULL) {
    $data = [
        'user_id' => $userId,
        'pass' => $pass
    ];

    $sql = 'UPDATE users SET user_password = :pass WHERE user_id = :user_id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':pass', $data['pass']);
    if ($stmt->execute()) {
        echo 'The publisher has been updated successfully!';
    }
    unset($stmt);
}
