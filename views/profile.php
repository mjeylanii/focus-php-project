<?php if (\app\core\Application::isGuest()): ?>
<div class="container-fluid text-center">
    <div class="container text-center w-25  ">
        <div class="container bg-light">
            <img class="img-fluid" src="images/user_images/3551739.jpg" alt="">
        </div>
    </div>
    <a href="" class="btn text-light btn-primary my-3">Change profile picture</a>

    <div class="container  ">
        <table class="table table-borderless w-25 mx-auto">
            <thead>
            <th class="fw-bolder" colspan="100%">User details</th>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Name:</th>
                <td> <?php echo \app\core\Application::$app->user->getFullName() ?></td>
            </tr>
            <tr>
                <th scope="row">E-mail:</th>

                <td> <?php echo \app\core\Application::$app->user->getEmail() ?></td>
            </tr>
            <tr>
                <th scope="row">Status: </th>
                <td colspan="2"> <?php echo \app\core\Application::$app->user->getStatus() ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="container-fluid d-flex justify-content-center flex-column align-items-center">
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
</div>
<!-- ============================================== CONTAINER: END ============================================== -->
<?php else: ?>
    <?php \app\core\Application::$app->router->response->setStatusCode('403'); ?>
    <div class="text-center">
        <div class="alert alert-danger"><h1>You do not have access to this page!</h1>
            <h2>Please login or contact us</h2></div>
        <p class="lead">Redirecting you to the home page...</p>
        <?php echo ' <meta http-equiv="refresh" 
          content="2; url=/" />' ?>
    </div>

<?php endif; ?>



