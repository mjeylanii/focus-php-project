<?php
$sifre = md5($_POST["sifre"]);
if ($sifre != NULL) {
    $sifresifirla = $conn->exec("UPDATE users SET uye_sifre='$sifre' WHERE user_type = 1");
    if ($sifresifirla > 0) {
        echo "Kayıt güncellendi.";
    } else {
        echo "Herhangi bir kayıt güncellenemedi.";
    }
}
