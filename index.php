<?php
define('__BASE__', __DIR__);
require_once 'includes\config.php';
session_start();
error_reporting(0);
$logout = $_GET["logout"];
if ($logout > 0) {
	session_destroy();
	session_set_cookie_params(0);
	echo '<meta http-equiv="refresh" content="0;URL=index.php?logout=0">';
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- mobile metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<!-- site metas -->
	<title>Focus</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="css/dark-switch.css">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
	<script src="https://unpkg.com/feather-icons"></script>
	<style>
		i {
			font-size: 1.5em;
		}

		body {
			transition: 1s;
		}

		#contact {
			background-image: url(images/contact-bg.png) !important;
			background-size: contain;
		}
	</style>
</head>

<body class="bg-light">

	<header id="home" class="section ">
		<div class="header_main">
			<!-- header inner -->
			<?php include('includes/menu.php') ?>
			<!-- end header inner -->
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex flex-column gap-4 justify-content-center">
						<h1 class=""><strong>Unlimited Web Hosting</strong></h1>
						<p class="lead">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor
							mauris sit amet orci.
							Aenean dignissim pellentesque felis.Donec nec justo
							eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean
							dignissim pellentesque felis.</p>
						<div class="container"> <a class="btn btn-md btn-success" href="#" role="button">Get Started</a>
							<a class="btn btn-lg btn-dark" href="about.html" role="button">Contact Us</a>
						</div>

					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="img-box">
							<figure><img src="images/woofer.png" alt="img" style="max-width: 100%;"></figure>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="col-md-9 ">
						<div class="input-group mb-3 mt-5">
							<input type="text" class="form-control" placeholder="Enter domain name here">
							<div class="input-group-append">
								<a class="text-light btn btn-dark rounded-end p-3" href="#">Search</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>
	<!-- banner end -->
	<!-- choose start -->

	<div class="container my-5">
		<div class="col-sm-12 text-center">
			<h1 class="display-4">Why you should <span class="text-success">choose us</span></h1>
			<p class="lead">Making it look like readable English. Many desktop publishing packages and web
				page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
				uncover any web sites still</p>
		</div>
	</div>

	<div class="container my-5">
		<div class="row">
			<div class="col-sm-4 mb-3">
				<div class="card border-success border-4 mb-3 p-3 bg-success text-white">
					<div class="icon"><a href="#"><img src="images/power-full-icon.png"></a></div>
					<h2 class="card-title">Powerful Features</h2>
					<p class="card-text">making it look like readable English. Many desktop publishing packages
						and web page editors now use Lorem Ipsum as their default model text, and a search for
						'lorem ipsum' will uncover many web sites still </p>
					<div class="btn_main">
						<a href="#" class="btn btn-danger">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-3">
				<div class="card border-success border-4 mb-3 p-3 bg-light">
					<div class="icon"><a href="#"><img src="images/optimised-icon.png"></a></div>
					<h2 class="totaly_text">Totaly Optimised</h2>
					<p class="making">making it look like readable English. Many desktop publishing packages and web
						page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
						will uncover many web sites still </p>
					<div class="btn_main">
						<a href="#" class="btn btn-secondary">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4 mb-3">
				<div class="card border-success border-4 mb-3 p-3 bg-light">
					<div class="icon"><a href="#"><img src="images/headfone-icon.png"></a></div>
					<h2 class="totaly_text">Worldwide Support</h2>
					<p class="making">making it look like readable English. Many desktop publishing packages and web
						page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
						will uncover many web sites still </p>
					<div class="btn_main">
						<a href="#" class="btn btn-secondary">Read More</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- choose start -->
	<!-- about start -->
	<div class="container-fluid bg-secondary">
		<div class="container my-5 p-5">
			<div class="row">
				<div class="col-md-6 mb-3">
					<div class="images">
						<img src="images/img-1.png" style="max-width: 100%;">
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<h1 class="display 2"><strong style="color: #2ba879;">599.00* .com</strong></h1>
					<h2 class="lead">Special Offer For Limited Time. 30% Discount On All Hosting Plans</h2>
					<p class="donec_text">making it look like readable English. Many desktop publishing packages and
						web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
						ipsum' will uncover many web sites still </p>
				</div>
			</div>
		</div>
	</div>
	<!-- about end -->
	<!-- service start -->
	<?php include("includes/services.php"); ?>
	<!-- service end -->
	<!-- contact start -->

	<div class="container text-center mt-5">
		<div class="col-sm-12">
			<h1 class="choose_text">Request A Call Back</h1>
			<p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority
				have suffered alteration in some form, by injected humour</p>
		</div>
	</div>
	<div class="container-fluid p-3 mt-5" id="contact">
		<div class="container ">
			<div class="row justify-content-center">
				<div class="col-md-6 py-5">
					<form class="row g-1 px-3" action="" method="GET">
						<div class="input-group ">
							<span class="input-group-text " id="basic-addon1">Name&nbsp;&nbsp;</span>
							<input type="text" class="form-control" placeholder="Name" name="name">
						</div>
						<div class="input-group col-md-12">
							<span class="input-group-text" id="basic-addon1">Email&nbsp;&nbsp;&nbsp;</span>
							<input type="text" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="input-group col-md-12">
							<span class="input-group-text" id="basic-addon1">Phone&nbsp;&nbsp;</span>
							<input type="tel" class="form-control" placeholder="Phone" name="num">
						</div>
						<div class="input-group col-md-12">
							<span class="input-group-text" id="basic-addon1">Message</span>
							<textarea class="form-control" placeholder="Massage" rows="5" id="comment" name="msg"></textarea>
						</div>
						<div class="form-floating mx-auto col-4">
							<input class="btn btn-lg btn-success ms-5" type="submit" value="Send" name="send_msg">
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<div class="section_right">
						<img src="images/img-2.png" style="max-width: 100%;" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php') ?>
	<!-- javascript -->
	<script src="js/dark-mode-switch.min.js"></script>
	<script src="js/navbar-switch.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

</body>

</html>
<?php
if (isset($_GET['send_msg'])) {
	require('messages.php');
}
if (isset($_GET['subscriber_email'])) {
	require_once('subscribe.php');
}
?>