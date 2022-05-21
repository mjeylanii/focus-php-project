<?php $mesaj_id = $_GET["id"];
if ($mesaj_id != 0) {
    $sonuc = $conn->exec("DELETE FROM messages WHERE mesaj_id='$mesaj_id'");
    if ($sonuc > 0) {
        echo "Mesaj silindi.";
    } else {
        echo "Herhangi bir mesaj silinemedi.";
    }
}
echo "<h5>Mesaj Sil</h5>";
while ($messages = $mesaj->fetch(PDO::FETCH_ASSOC)) {
    $gonderen_id = $messages["gonderen_id"];
    $gelen = $messages["gelen_id"];
    $gonderen = $conn->query("SELECT * FROM users where user_id='$gonderen_id'");
    $gonderen_kisi = $gonderen->fetch(PDO::FETCH_ASSOC);
    echo "Sender: " . $gonderen_kisi["user_name"] . "<br />";
    $gelen = $conn->query("SELECT * FROM users where user_id='$gelen'");
    $gelen_kisi = $gelen->fetch(PDO::FETCH_ASSOC);
    echo "Alan: " . $gelen_kisi["user_name"] . "<br /> Mesaj: " . $messages["mesaj"] . "<br /> Tarih : " . $messages["mesaj_tarih"]  . "<br/> Mesaj ID : " .
        $messages["mesaj_id"] .  "<br />" . '<a class="btn btn-danger style="color:white;" href="index.php?islem=11&id=' .
        $messages["mesaj_id"] .  '">SIL</a><hr/>';
}
