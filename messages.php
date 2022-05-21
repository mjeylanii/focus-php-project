<?php
include('config.php');
////////////////////////////////////////////////////////////////////////////////
$name = $_GET["name"];
$email = $_GET["email"];
$phone = $_GET["num"];
$msg = $_GET["msg"];
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
if (!empty($msg)) {
    $sql = "INSERT INTO messages(message_name, message_email, message_phone, message_txt) VALUES('$name', '$email', '$phone', '$msg')";
    $conn->query($sql);
    echo '<script>alert("Message sent successfuly");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
} else {
    echo '<script>alert("Message cannot be empty!");</script>';
}
//INSERT INTO mesajlar(gonderen_id, gelen_id, mesaj, mesaj_durum) VALUES($msg)  $_SESSION['user'];