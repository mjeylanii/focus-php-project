<?php
include('C:\xampp\htdocs\focus\includes\config.php');
session_start();
error_reporting(0) ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="dark-switch.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
    }
  </style>
</head>

<body class="text-center d-flex justify-content-center align-items-center bg-light">
  <nav class="navbar position-absolute top-0">
    <div class="navbar-nav">
      <div class="nav-item"><a href="http://localhost/focus/index.php" class="nav-link">Home</a></div>
      <div class="form-check form-switch ">
        <input type="checkbox" class="form-check-input" id="darkSwitch" />
        <label class="form-check-label" for="flexSwitchCheckDefault"><span class="text-warning moon d-none" id="moon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="rgb(255,255,224)" class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
              <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
              <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
            </svg>
          </span>
          <span class="text-warning sun d-none" id="sun">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-low-fill" viewBox="0 0 16 16">
              <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8.5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z" />
            </svg>
          </span>
        </label>
      </div>
    </div>
  </nav>
  <?php
  $register = $_GET["register"];
  if ($register == NULL) {
    $register = 1;
  }
  if ($register > 0) {
    echo '<div class="form-register d-flex flex-column justify-content">
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
        <input  id="floatingInput bg-light" class="form-control" type="email" name="email" placeholder="E-mail" required>
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
  <script src="dark-switch.js"></script>

</body>

</html>
<!--LOGIN PHP CODE-->
<?php
//CHECK IF THE LOGIN BUTTON WAS CLICKED 
if (isset($_POST['submit_login'])) {
  ////////////////////////////////////////////////////////////////////////////
  $mail = $_POST["email"];
  $pass = MD5($_POST["pass"]);
  echo $mail . $pass;
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
      $_SESSION['full-name'] = $dataArray['user_name'] . " " . $dataArray['user_surname'];
      $_SESSION['name'] = $dataArray['user_name'];
      $_SESSION['email'] = $dataArray['user_email'];
      $_SESSION['registration'] = $dataArray['registration_date'];
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
  $pass = MD5($_POST["pass"]);
  ////////////////////////////////////////////////////////////////////
  $sql = "SELECT * FROM users WHERE user_email='$mail' "; //A PHP VARIABLE THAT HOLDS SQL CODE TO QUERY THE EMAIL SPECIFIED
  $say = $conn->query($sql); //INVOKING THE QUERY FUNCTION THAT TAKES THE GIVEN SQL QUERY VARIABLE
  $dataArray = $say->fetch(PDO::FETCH_ASSOC);
  ////////////////////////////////////////////////////////////////////
  if ($say->rowCount() > 0) {
    echo '<script>alert("Mail adresi kayıtlı");</script>';
    header("location:  http://localhost/focus/index.php");
  } else {
    $sql = "INSERT INTO users (user_id , user_name, user_surname, user_email, user_password, user_type, user_status)	
            VALUES ($id, '$name', '$surname', '$mail','$pass','2', 'NOT VERIFIED')";
    $sqluser = "INSERT INTO user_settings(theme, image_id, user_id) VALUES('light', 1,$id)";
    $conn->exec($sql);
    $conn->exec($sqluser);
    $_SESSION['type'] = 2;
    echo '<script>alert("Registered succesfully");</script>';
    header("location:  http://localhost/focus/index.php");
  }
}
?>