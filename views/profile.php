<!DOCTYPE html>
<html lang="en">


<div class="container-fluid text-center">
    <div class="container text-center bg-primary w-25 rounded-circle">
        <div class="container-fluid bg-light rounded-circle">
        </div>
    </div>
    <a href="" class="btn text-light btn-primary mt-3">Change profile picture</a>
    <hr>
    <div class="container-fluid d-flex justify-content-center flex-column align-items-center">
    <h3 class="jumbotron text-dark mt-5 fw-bolder">Account details</h3>
    <table class="table bg-light w-50 mb-5 table-striped">
        <thead class="text-center">
        <tr class="text-center ">
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
            echo '<th scope="row">' . @$_SESSION['user'] . '</th>'
                . '<td >' . @$_SESSION['name'] . '</td>'
                . '<td>' . @$_SESSION['email'] . '</td>'
                . '<td>' . @$_SESSION['registration'] . '</td>'
                . '<td>' . @$_SESSION['status'] . '</td>';
            ?>
        </tr>
        </tbody>
    </table>
    <br>
    <h3 class="jumbotron text-dark mt-5 fw-bolder">Registered services</h3>
    <table class="table w-50 bg-light table-striped ">
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
            <td class="text-center" colspan="100%"><a href="services.php" class="btn btn-light"><i
                            class="bi bi-plus"></i></a></td>
        </tr>
        </tbody>
    </table>
    <h3 class="jumbotron text-dark mt-5 fw-bolder">Payment info</h3>
    <table class="table text-dark w-50 table-striped ">
        <thead>
        <tr>
            <th scope="col">Payment Type</th>
            <th scope="col">Card Name</th>
            <th scope="col">Cardholder</th>
            <th scope="col">Address</th>
            <th scope="col">Card number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center" colspan="100%"><a href="" class="btn btn-light"><i class="bi bi-plus"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
    </div>
    <!-- ============================================== CONTAINER: END ============================================== -->


