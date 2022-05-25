<?php
include('./config.php');

if (isset($_GET['request'])) {
    $sql = $conn->query("SELECT * FROM messages WHERE message_status='Not Read'");
    $result = $sql->fetchAll();
    echo count($result);
}
