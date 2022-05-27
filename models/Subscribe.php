<?php

$email = $_GET['subscriber_email'];

try {
    \app\core\Application::$app->db->pdo->exec("INSERT INTO subscribers(subscriber_email) VALUES('$email')");
    header("location: http://localhost/focus/index.php");
    echo '<script> alert("Thanks for subscribing!"); </script>';
} catch (PDOException $e) {
    echo '<script> alert("Email already subscribed!"); </script>';
}
