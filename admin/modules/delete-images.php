<?php $img_id = $_GET["id"];
if ($img_id != 0) {
    $sonuc = $conn->exec("DELETE FROM images WHERE img_id='$img_id'");
    if ($sonuc > 0) {
        echo  "Resim silindi.";
        echo '<meta http-equiv="refresh" content="1;URL=index.php?islem=7">';
    } else {

        echo "Herhangi bir resim silinemedi.";
    }
}

while ($result = $img->fetch(PDO::FETCH_ASSOC)) {
    echo '<img src="./uploads/' . $result["img"] . '" class="img-fluid w-25 h-25 m-2">';
}

echo "<h3><b>Resim Sil</h3>" . "</br>";
while ($result = $img->fetch(PDO::FETCH_ASSOC)) {
    echo '<img src="./uploads/' . $result["img"] . '" class="img-fluid w-25 h-25 m-2">' .
        '<a class="btn btn-danger" style="color:white;" href="index.php?islem=12&id=' .
        $result["img_id"] . '">SİL</a>' . "</br>" . $result["img"] . "</br>";
}
