<?php
include('C:\xampp\htdocs\focus\includes\config.php');
session_start();
$logout = @$_GET["logout"];
if ($logout > 0) {
  session_destroy();
  session_set_cookie_params(0);
  echo '
<meta http-equiv="refresh" content="0;URL=login.php?logout=0">';
} else {
} ?>

<!--REGISTRATION PHP CODE-->
<?php
//CHECK IF THE THE REGISTRATION BUTTON WAS CLICKED 
if (isset($_POST['submit_registration'])) {
  /////////////////////////////////////////////////////////////////////
  $id = rand(990000, 100000);
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $mail = $_POST["email"];
  $pass = MD5($_POST["pass"]);
  ////////////////////////////////////////////////////////////////////
  $sql = "SELECT * FROM users WHERE user_email='$mail' "; //A PHP VARIABLE THAT HOLDS SQL CODE TO QUERY THE EMAIL SPECIFIED
  $say = $conn->query($sql); //INVOKING THE QUERY FUNCTION THAT TAKES THE GIVEN SQL QUERY VARIABLE
  $dataArray = $say->fetch(PDO::FETCH_ASSOC);
  ////////////////////////////////////////////////////////////////////
  if ($say->rowCount() > 0) {
    echo '<script>alert("E-mail already registered!");</script>';
    header("location:http://localhost/focus/index.php");
  } else {
    $sql = "INSERT INTO users (user_id , user_name, user_surname, user_email, user_password, user_type, user_status)
            VALUES($id, '$name', '$surname', '$mail','$pass','2', 'NOT VERIFIED')";
    $sqluser = "INSERT INTO user_settings(theme, image_id, user_id) VALUES('light', 1,$id)";
    $conn->exec($sql);
    $conn->exec($sqluser);
    $_SESSION['type'] = 2;
    echo '<script>alert("Registered succesfully");</script>';
    header("location:http://localhost/focus/index.php");
  }
}
?>