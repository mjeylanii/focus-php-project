<?php
echo "<h5>Verify user</h5>" . "</br>";
echo '<table>';
while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "Name: " . $result["user_name"] . "<br /> Surame: " . $result["user_surname"] . "<br /> E-posta: " . $result["user_email"] . "</br>" .
        '<button type="button" class="btn btn-success text-light"><a class="text-light" href="index.php?islem=9&id=' .
        $result[" user_id"] . '">ONAY</a></button>' . '<button type="button" class="btn btn-danger text-light m-2"><a class="text-light" href="index.php?islem=9&id='
        . $result["user_id"] . '">Sil</a></button>' . "<hr />";
}
echo "<h5>Delete user</h5>" . "</br>";
while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "Name: " . $result["user_name"] . "<br /> Surame: " . $result["user_surname"] . "<br /> E-posta: " . $result["user_email"] . "<br>";
    echo '<button type="button" class="btn btn-danger"><a style="color:white;" href="index.php?islem=9&id=' . $result[" user_id"] . '">SİL</a></button>';
    echo "<hr/>";
}
