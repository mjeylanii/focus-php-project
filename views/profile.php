<?php use app\models\Payment;

if (\app\core\Application::isGuest()): ?>
    <div class="container-fluid text-center">
        <div class="row ">
            <div class="container col-12 text-center w-25 ">
                <img class="img-fluid"
                     src="https://picsum.photos/200/300?random=1"
                     alt="">
            </div>
            <div class="container col-12 ">
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                    Change profile picture
                </button>
            </div>
        </div>
        <div class="container col-sm-12 col-md-3 mt-5">
            <table class="table table-borderless table-striped mx-auto mt-3">
                <thead>
                <th class="fw-bolder display-6" colspan="100%">User details</th>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Name:</th>
                    <td class="text-start"> <?php echo strtoupper(\app\core\Application::$app->user->getFullName()) ?></td>
                </tr>
                <tr>
                    <th scope="row">E-mail:</th>
                    <td class="text-start"> <?php echo \app\core\Application::$app->user->getEmail() ?></td>
                </tr>
                <tr>
                    <th scope="row">Status:</th>
                    <td class="text-start"
                        colspan="2"> <?php echo \app\core\Application::$app->user->getStatus() ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <br>
            <h3 class="jumbotron text-dark mt-5 fw-bolder">Registered services</h3>
            <?php
            $order = new \app\models\Order();
            $where = ['user_id' => \app\core\Application::$app->session->get('user')];
            $checkoutData = $order->getAll($order::class, ['user_id' => \app\core\Application::$app->session->get('user')]);
            $checkoutArr = array();
            foreach ($checkoutData as $sub) {
                foreach ($sub as $value) {
                    $checkoutArr[] = $value;
                }
            } ?>
            <table class="table  bg-light table-striped ">
                <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Payment ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Order Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    if ($checkoutArr) {
                        echo '<td>' . $checkoutArr[0] . '</td>' .
                            '<td>' . $checkoutArr[1] . '</td>' .
                            '<td>' . $checkoutArr[3] . '</td>' .
                            '<td>' . $checkoutArr[4] . '</td>';
                    }
                    ?>
                    <td class="text-center" colspan="100%"><a href="services.php" class="btn btn-light"><i
                                    class="bi bi-plus"></i></a></td>
                </tr>
                </tbody>
            </table>

            <h3 class="jumbotron text-dark mt-5 fw-bolder">Payment info</h3>
            <table class="table text-dark table-striped ">
                <thead>
                <tr>
                    <?php
                    $payment = new Payment();
                    $paymentData = $payment->getAll($payment::class, ['user_id' => \app\core\Application::$app->session->get('user')]);
                    $paymentArr = array();
                    foreach ($paymentData as $sub) {
                        foreach ($sub as $value) {
                            $paymentArr[] = $value;
                        }
                    } ?>
                    '
                    <th scope="col">Payment Type</th>
                    <th scope="col">Card Name</th>
                    <th scope="col">Cardholder</th>
                    <th scope="col">Address</th>
                    <th scope="col">Card number</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    if ($paymentArr) {
                        echo '<td>' . $paymentArr[0] . '</td>' .
                            '<td>' . $paymentArr[1] . '</td>' .
                            '<td>' . $paymentArr[2] . '</td>' .
                            '<td>' . $paymentArr[3] . '</td>' .
                            '<td>' . $paymentArr[4] . '</td>';
                    }
                    ?>
                </tr>
                <tr>
                    <td class="text-center" colspan="100%"><a href="" class="btn btn-secondary"><i
                                    class="bi bi-plus"></i></a>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/profile" method="POST">
                    <div class="mb-3">
                        <label for="formFileDisabled" class="form-label">Disabled file input example</label>
                        <input class="form-control" type="file" id="formFileDisabled" disabled>
                    </div>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

