<?php
require_once 'includes\config.php';
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Pricing example · Bootstrap v5.1</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/pricing/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- style css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootlint@1.1.0/dist/browser/bootlint.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/dark-switch.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        * {
            transition: 1s;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .feather {
            width: 24px;
            height: 24px;
            vertical-align: text-center;
        }
    </style>
</head>

<body>
    <?php
    require_once 'includes/menu.php'; ?>
    <div class="container py-3">
        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm bg-light">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Standard</h4>
                        </div>
                        <div class="card-body ">
                            <h1 class="card-title pricing-card-title">$5<small class="text-muted fw-light bg-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                <li>Help center access</li>
                            </ul>
                            <a href="" class="w-100 btn btn-lg btn-success">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm bg-light">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light bg-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>20 users included</li>
                                <li>10 GB of storage</li>
                                <li>Priority email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-success">Add to cart </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm bg-light">
                        <div class="card-header py-3 text-white bg-success border-success">
                            <h4 class="my-0 fw-normal">Enterprise</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light bg-light">/mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>30 users included</li>
                                <li>15 GB of storage</li>
                                <li>Phone and email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-success">Contact us</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-3">

                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm bg-light">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Extra 40gb bandwidth</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$40/<small style="font-size: 1rem;" class="text-muted fw-light bg-light ">/One time payment</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>40gb bandwidth</li>
                                    <li>1 month</li>
                                </ul>
                                <a href="" class="w-100 btn btn-lg btn-success">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm bg-light">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Extra 140gb Bandwidth</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$150/<small style="font-size: 1rem;" class="text-muted fw-light bg-light">One time payment</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-success">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm  bg-light">
                            <div class="card-header py-3 bg-success text-white ">
                                <h4 class="my-0 fw-normal">Unlimited bandwidth</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$350<small class="text-muted fw-light bg-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Extra 30 users included</li>
                                    <li>For duration of plan</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-success">Contact us</button>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <?php
        require_once 'includes/footer.php';
        ?>
        <script>
            feather.replace({
                'aria-hidden': 'true'
            })
        </script>
        <script src="js/dark-mode-switch.min.js"></script>
        <script src="js/navbar-switch.js"></script>
</body>

</html>