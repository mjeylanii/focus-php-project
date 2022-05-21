<?php
include('C:\xampp\htdocs\focus\includes\config.php');
session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      height: 100vh;
      background-color: #f5f5f5;
    }
  </style>
</head>

<body class="text-center bg-default d-flex justify-content-center align-items-center ">
  <nav class="navbar">
    <div class="navbar-nav">
      <div class="nav-item"><a href="http://localhost/focus/index.php" class="nav-link">Home</a></div>
    </div>
  </nav>
  <?php
  $register = $_GET["register"];
  if ($register > 0) {
    echo '<div class="form-register d-flex flex-column justify-content-center">
        <img class="img-fluid mx-auto bg-light" src="logo.png" alt="logo" width="72" height="54">
        <form class="rounded-md mt-5 p-5 rounded" action="" method="POST">
        <div class="form-floating"> 
        <input id="floatingInput" class="form-control" type="text" name="name" placeholder="Name" required>
        <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating"> 
        <input  id="floatingInput" class="form-control" type="text" name="surname" placeholder="Surname"required>
        <label for="floatingInput">Surame</label>
        </div>
        <div class="form-floating"> 
        <input  id="floatingInput" class="form-control" type="email" name="email" placeholder="E-mail" required>
        <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating"> 
        <input  id="floatingInput" class="form-control" type="password" name="pass" placeholder="Password" required>
        <label for="floatingInput">Password</label>
        </div>
        <input class="btn btn-primary mb-3 mt-3" type="submit" value="Register" name="submit_registration">
        </form>
        <p class="">Have an account? <a class="lead text-muted" href="login-register.php?register=0">Login</a></p> 
      </div>
      ';
  } else {
    echo '
    <div class="form-register d-flex flex-column rounded-lg ">
    <img class="img-fluid mx-auto" src="logo.png" alt="logo" width="72" height="54">
      <form class="rounded-md p-5 mt-3 rounded" action="" method="POST">
      <div class="form-floating"> 
      <input  id="floatingInput" class="form-control" type="email" name="email" placeholder="E-mail" required>
      <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating"> 
      <input  id="floatingInput" class="form-control" type="password" name="pass" placeholder="Password" required>
      <label for="floatingInput">Password</label>
      </div>
        <input class="btn btn-primary mt-3" type="submit" value="Login" name="submit_login">
      </form> 
      <p class="">No account? <a class="lead text-muted" href="login-register.php?register=1">Register</a></p> 
      </div>
      ';
  }
  ?>
</body>

</html>
<!--LOGIN PHP CODE-->
<?php
//CHECK IF THE LOGIN BUTTON WAS CLICKED 
if (isset($_POST['submit_login'])) {
  ////////////////////////////////////////////////////////////////////////////
  $mail = $_POST["email"];
  $pass = MD5($_POST["password"]);
  ////////////////////////////////////////////////////////////////////////////
  $sql = "SELECT  * FROM users WHERE user_email='$mail' AND user_password ='$pass'";
  $count = $conn->query($sql);

  if (($count->rowCount()) <= 0) {
    //WARN USER THAT GIVEN USER DOES NOT EXIST
    //WARN USER THAT EMAIL DOES NOT EXIST
    //header('location:http://localhost/focus/index.php'); //REDIRECT USER TO LOGIN/REGISTRATION PAGE
    echo '<script>alert("Wrong email or password");</script>';
  } else {
    ////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT user_type FROM users WHERE user_email='$mail'";
    $result = $conn->query($sql);
    ///////////////////////////////////////////////////////////////////////////
    /* A CONDITIONAL STATEMENT THAT CHECKS IF THE QUERY RETURN ANYTHING */
    if ($result->fetchColumn() == 1) {
      $sql = "SELECT * FROM users WHERE user_email='$mail'"; //A QUERY TO FETCH COLUMNS WHERE THE MAIL COLUMN EQUALS THE VARIABLE '$mail'
      $data = $conn->query($sql); //EXECUTING THE QUERY AND STORING THE VALUES TO $DATA VARIABLE
      $dataArray = $data->fetch(PDO::FETCH_ASSOC); //STORING THE VALUES FROM DATA TO AND ARRAY OF DATA
      $_SESSION['user'] = $dataArray['user_id']; //SETTING THE USER SESSION VALUE TO CORRESPONDING ID
      $_SESSION['type'] = $dataArray['user_type']; //SETTING THE TYPE SESSION VALUE TO CORRESPONDING TYPE
      header('location:http://localhost/focus/index.php'); //DIRECT USER TO ADMIN PAGE
    } else {
      $sql = "SELECT * FROM users WHERE user_email='$mail'"; //SQL CODE TO QUERY COLUMNS FROM THE USERS TABLE
      $data = $conn->query($sql);
      $dataArray = $data->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user'] = $dataArray['user_id'];
      $_SESSION['type'] = $dataArray['user_type'];
      $_SESSION['full-name'] = $dataArray['user_name'] . " " . $dataArray['user_surname'];
      $_SESSION['name'] = $dataArray['user_name'];
      $_SESSION['email'] = $dataArray['user_email'];
      $_SESSION['registration'] = $dataArray['registration_date'];
      if ($dataArray['user_status'] == NULL) {
        $_SESSION['status'] = "NOT VERIFIED";
      }
      header('location: http://localhost/focus/index.php');
    }
  }
}
?>
<!--REGISTRATION PHP CODE-->
<?php
//CHECK IF THE THE REGISTRATION BUTTON WAS CLICKED 
if (isset($_POST['submit_registration'])) {
  /////////////////////////////////////////////////////////////////////
  $id = rand(990000, 100000);
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $mail = $_POST["email"];
  $spass = MD5($_POST["pass"]);
  ////////////////////////////////////////////////////////////////////
  $sql = "SELECT * FROM users WHERE user_email='$mail' "; //A PHP VARIABLE THAT HOLDS SQL CODE TO QUERY THE EMAIL SPECIFIED
  $say = $conn->query($sql); //INVOKING THE QUERY FUNCTION THAT TAKES THE GIVEN SQL QUERY VARIABLE
  $dataArray = $say->fetch(PDO::FETCH_ASSOC);
  ////////////////////////////////////////////////////////////////////
  if ($say->rowCount() > 0) {
    echo '<script>alert("Mail adresi kayıtlı");</script>';
    header("location:  http://localhost/focus/index.php");
  } else {
    $sql = "INSERT INTO users (user_id , user_name, user_surname, user_email, user_password, user_type)	
            VALUES ($id, '$name', '$surname', '$mail','$pass','2')";
    $sqluser = "INSERT INTO user_settings(theme, image_id, user_id) VALUES('light', 1,$id)";
    $conn->exec($sql);
    $conn->exec($sqluser);
    $_SESSION['type'] = 2;
    echo '<script>alert("Registered succesfully");</script>';
    header("location:  http://localhost/focus/index.php");
  }
}
?>