<?php echo "<h5>Messages</h5>" . "</br>";
while ($messages = $mesaj->fetch(PDO::FETCH_ASSOC)) {
    $sender = $messages["gonderen_id"];
    $gelen = $messages["gelen_id"];
    $gonderen = $conn->query("SELECT * FROM users where user_id='$gonderen_id'");
    $gonderen_kisi = $gonderen->fetch(PDO::FETCH_ASSOC);
    echo "Sender: " . $gonderen_kisi["user_name"] . "<br />";
    $gelen = $conn->query("SELECT * FROM users where user_id='$gelen'");
    $gelen_kisi = $gelen->fetch(PDO::FETCH_ASSOC);
    echo "Alan : " . $gelen_kisi["user_name"] . "<br /> Mesaj: " . $messages["mesaj"] . "<br /> Tarih : " . $messages["mesaj_tarih"] . "<br /> Mesaj ID : " .
        $messages["mesaj_id"] . "<br />" . "
<hr />";
}
