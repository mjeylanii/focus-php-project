<?php
session_start();
//error_reporting(0);
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>My Account</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home bg-light">
    <header class="">
        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/menu.php'); ?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <!-- ============================================== MAIN CONTAINER: START ============================================== -->
    <div class="container-fluid text-center">
        <div class="container text-center bg-primary w-25 rounded-circle">
            <div class="container-fluid bg-light rounded-circle"><?php
                                                                    $userId = $_SESSION['user'];
                                                                    $img = $conn->query("SELECT * FROM images AS img, user_settings AS us, users AS u WHERE img.img_id = us.image_id ");
                                                                    $imgAdd = $img->fetch(PDO::FETCH_ASSOC);
                                                                    echo '<img src="./assets/user_images/' . $imgAdd["img_adress"] . '" class="img-fluid rounded-circle ">';
                                                                    ?>
            </div>
        </div>
        <a href="" class="btn text-dark btn-primary mt-3">Change profile picture</a>
        <hr>
        <h3 class="jumbotron text-dark mt-5 fw-bolder">Account details</h3>
        <center>
            <table class="table text-light w-50 mb-5 table-striped">
                <thead class="text-center">
                    <tr class="text-center text-dark">
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Registration date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="text-dark bg-light">
                    <tr>
                        <?php
                        echo '<th scope="row">' . $_SESSION['user'] . '</th>'
                            . '<td >' .  $_SESSION['name'] . '</td>'
                            . '<td>' .  $_SESSION['email'] . '</td>'
                            . '<td>'  . $_SESSION['registration'] .  '</td>'
                            . '<td>'  . $_SESSION['status'] . '</td>';
                        ?>
                    </tr>
                </tbody>
            </table>
        </center>
        <br>
        <h3 class="jumbotron text-dark mt-5 fw-bolder">Registered services</h3>
        <center>
            <table class="table text-dark w-50 table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" colspan="100%"><a href="" class="btn btn-light"><i class="bi bi-plus"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </center>
        <h3 class="jumbotron text-dark mt-5 fw-bolder">Payment info</h3>
        <center>
            <table class="table text-dark w-50 table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Card Name</th>
                        <th scope="col">Cardholder</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Card number</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" colspan="100%"><a href="" class="btn btn-light"><i class="bi bi-plus"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </center>
        <!-- ============================================== CONTAINER: END ============================================== -->
    </div>
</body>

</html>
<?php  ?>