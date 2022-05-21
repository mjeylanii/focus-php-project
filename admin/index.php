<?php
session_set_cookie_params(0);
session_start();
include('C:\xampp\htdocs\focus\config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .col-sm {
            border: 2px solid grey;
        }

        a,
        a:hover {
            color: white;
            text-decoration: none;
        }

        a:hover {
            background-color: red;
        }

        body {
            background-color: #0827F5;
            color: white;
            font-family: 'VT323', monospace;
            font-size: 1.5rem;
        }
    </style>

</head>

<body>
    <center>
        <h2>Admin Panel</h2>
    </center>
    <div class="container" style="padding:50px;">

        <div class="row">
            <div class="col-sm">
                Üyeler
                <hr>
                <a href="index.php?islem=1"><i class="bi bi-caret-right-fill"></i>Display users</a><br>
                <a href="index.php?islem=2"><i class="bi bi-caret-right-fill"></i>Verify users</a><br>
                <a href="index.php?islem=3"><i class="bi bi-caret-right-fill"></i>Delete user</a>
            </div>
            <div class="col-sm">
                messages
                <hr>
                <a href="index.php?islem=4"><i class="bi bi-caret-right-fill"></i>Messages</a><br>
                <a href="index.php?islem=5"><i class="bi bi-caret-right-fill"></i>Delete messages</a>
            </div>
            <div class="col-sm">
                Profil
                <hr>
                <a href="index.php?islem=6"><i class="bi bi-caret-right-fill"></i>Add image</a><br>
                <a href="index.php?islem=7"><i class="bi bi-caret-right-fill"></i>Delete images</a><br>
                <a href="index.php?islem=8"><i class="bi bi-caret-right-fill"></i>Change password</a>
            </div>
        </div>
        <br>
        <?php

        if ($_SESSION['user'] == NULL || $_SESSION['type'] != 1) {
            echo '<script>alert("You do not have access!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=/focus/index.php">';
        } ?>
        <?php
        $sql = $conn->query("SELECT * FROM users WHERE user_type='2'");
        $message = $conn->query("SELECT * FROM messages"); //A query of all columns in the messages table
        $img = $conn->query("SELECT * FROM images");
        $islem = @$_GET["islem"];
        switch ($islem) {
            case "1":
                while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "Name: " . $result["user_name"] . "<br /> Surame: " . $result["user_surname"] . "<br /> E-posta: " . $result["user_email"] . "<hr />";
                }
                break;
            case "2":
                echo "<h5>Verify user</h5>" . "</br>";
                echo '<table>';
                while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "Name: " . $result["user_name"] . "<br /> Surame: " . $result["user_surname"] . "<br /> E-posta: " . $result["user_email"] . "</br>" .
                        '<button type="button" class="btn btn-success text-light"><a class="text-light" href="index.php?islem=9&id=' . $result["user_id"] . '">ONAY</a></button>' .
                        '<button type="button" class="btn btn-danger text-light m-2"><a class="text-light" href="index.php?islem=9&id=' . $result["user_id"] .
                        '">Sil</a></button>' . "<hr />";
                }

                break;
            case "3":
                echo "<h5>Delete user</h5>" . "</br>";
                while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "Name: " . $result["user_name"] . "<br /> Surame: " . $result["user_surname"] . "<br /> E-posta: " . $result["user_email"] . "<br>";
                    echo '<button type="button" class="btn btn-danger"><a  style="color:white;" href="index.php?islem=9&id=' . $result["user_id"] . '">SİL</a></button>';
                    echo "<hr/>";
                }
                break;
            case "4":
                echo "<h5>Messages</h5>" . "</br>";
                while ($messages = $mesaj->fetch(PDO::FETCH_ASSOC)) {
                    $sender = $messages["gonderen_id"];
                    $gelen = $messages["gelen_id"];
                    $gonderen = $conn->query("SELECT * FROM users where user_id='$gonderen_id'");
                    $gonderen_kisi = $gonderen->fetch(PDO::FETCH_ASSOC);
                    echo "Sender: " . $gonderen_kisi["user_name"] . "<br />";
                    $gelen = $conn->query("SELECT * FROM users where user_id='$gelen'");
                    $gelen_kisi = $gelen->fetch(PDO::FETCH_ASSOC);
                    echo "Alan : " . $gelen_kisi["user_name"] . "<br/> Mesaj: " . $messages["mesaj"] . "<br/> Tarih : " . $messages["mesaj_tarih"] . "<br/> Mesaj ID : " .
                        $messages["mesaj_id"]  .  "<br/>" . "<hr/>";
                }
                break;
            case "5":
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
                break;
            case "6":
                echo "Resim Ekle";
                echo '<form action="resimekle.php" method="POST" enctype="multipart/form-data">
                       <input type="file" name="image" id="image">
                       <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
                 </form>';
                while ($result = $img->fetch(PDO::FETCH_ASSOC)) {
                    echo '<img src="./uploads/' . $result["img"] . '" class="img-fluid w-25 h-25 m-2">';
                }
                break;
            case "7":
                echo "<h3><b>Resim Sil</h3>" . "</br>";
                while ($result = $img->fetch(PDO::FETCH_ASSOC)) {
                    echo '<img src="./uploads/' . $result["img"] . '" class="img-fluid w-25 h-25 m-2">' .
                        '<a class="btn btn-danger" style="color:white;" href="index.php?islem=12&id=' .
                        $result["img_id"] . '">SİL</a>' . "</br>" . $result["img"] . "</br>";
                }
                break;
            case "8":
                echo '<form class="p-2 d-flex gap-1" action="index.php?islem=10" method="POST"> Yeni Şifre: <input type="text" name="sifre"><br> <input type="submit"></form>';
                break;
            case "9":
                $users_id = $_GET["id"];
                if ($users_id != 0) {
                    $sonuc = $conn->exec("DELETE FROM users WHERE user_id='$users_id'");
                    if ($sonuc > 0) {
                        echo "Kayıt silindi.";
                    } else {
                        echo "Herhangi bir kayıt silinemedi.";
                    }
                }
                break;
            case "10":
                $sifre = md5($_POST["sifre"]);
                if ($sifre != NULL) {
                    $sifresifirla = $conn->exec("UPDATE users SET uye_sifre='$sifre' WHERE user_type = 1");
                    if ($sifresifirla > 0) {
                        echo "Kayıt güncellendi.";
                    } else {
                        echo "Herhangi bir kayıt güncellenemedi.";
                    }
                }

                break;
            case "11":
                $mesaj_id = $_GET["id"];
                if ($mesaj_id != 0) {
                    $sonuc = $conn->exec("DELETE FROM messages WHERE mesaj_id='$mesaj_id'");
                    if ($sonuc > 0) {
                        echo "Mesaj silindi.";
                    } else {
                        echo "Herhangi bir mesaj silinemedi.";
                    }
                }
                break;
            case "12":
                $img_id = $_GET["id"];
                if ($img_id != 0) {
                    $sonuc = $conn->exec("DELETE FROM images WHERE img_id='$img_id'");
                    if ($sonuc > 0) {
                        echo  "Resim silindi.";
                        echo '<meta http-equiv="refresh" content="1;URL=index.php?islem=7">';
                    } else {

                        echo "Herhangi bir resim silinemedi.";
                    }
                }
                break;
            default:
                echo "ISLEM SECIN";
        }
        ?>
    </div>
</body>

</html>