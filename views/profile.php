<?php use app\models\Payment;

if (\app\core\Application::isGuest()): ?>
    <div class="container-fluid text-center">
        <div class="row ">
            <div class="container text-center p-3 w-25 h-25 p-5 ">
                <?php if ($params) {
                    $imgArr = json_decode(json_encode($params), true);
                    $path = 'images/user_images/' . $imgArr['img_adress'];
                    if (file_exists($path)) {
                        echo ' <img style="height: 240px; weight: 50px;" class="rounded" src="images/user_images/' . $imgArr['img_adress'] . '" alt="">';
                    } else {
                        echo '<img class="img-fluid" src="https://picsum.photos/200/300?random=1" alt="">';
                    }
                } ?>
                <?php ?>
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
    <div class="text-center container-fluid h-75">
        <div class="alert alert-danger"><h1>You do not have access to this page!</h1>
            <h2>Please login or contact us</h2></div>
        <p class="lead">Redirecting you to the home page...</p>
        <?php echo ' <meta http-equiv="refresh"
          content="2; url=/" />' ?>
    </div>
<?php endif; ?>


