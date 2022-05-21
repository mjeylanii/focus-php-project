<?php
error_reporting(0);
session_start(); ?>

<head>
	<style>

	</style>
</head>
<nav class="navbar navbar-expand-lg mb-5 px-4  bg-light navbar-light " id="navbar">
	<div class="container-fluid">
		<a class="navbar-brand  fw-bolder mb-2 mb-lg-0 d-flex gap-1 text-decoration-none" href="#">
			<img src="images/logo.png" alt="" width="42" height="32" class="d-inline-block align-text-top">
			<p class="d-inline ">FOCUS</p>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
				<li class="nav-item"><a class="nav-link fw-bold link-active" href="index.php" aria-current="page">Home</a></li>
				<li class="nav-item"><a class="nav-link fw-bold" href="#about" aria-current="page">About</a></li>
				<li class="nav-item"><a class="nav-link fw-bold" href="#service" aria-current="page">Service</a></li>
				<li class="nav-item"><a class="nav-link fw-bold" href="#contact">Contact Us</a></li>
				<?php
				if ($_SESSION['user'] != NULL) {
					echo '<div class="dropcenter text-end">
					    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle nav-link fw-bold" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">' .
						$_SESSION['name'] .
						'
                        </a>
					                  <ul class="dropdown-menu dropdown-menu-end  text-small me-3" aria-labelledby="dropdownUser1">
								      <li> <a class="dropdown-item" href="my-account.php">Profile</a></li>
									  <li>  <a class="dropdown-item" href="my-account.php">Orders</a></li>				     									  
									  ';
					if ($_SESSION['type'] == 1) {
						echo  '<li><a class="dropdown-item" href="admin/index.php">Admin Panel</a></li>';
					};
					echo '<li><a class="dropdown-item text-danger" href="index.php?logout=1">Logout</a></li>
					</ul>
					</div>';
				} else {
					echo  '  <div class="dropstart me-2">
					<a class="btn btn-outline-warning dropdown-toggle nav-link" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
					Login
				    </a>
					         <ul class="text-small dropdown-menu shadow px-4" aria-labelledby="dropdownUser1">
					         <form method="POST" action="modules/login-register.php" class="form-inline row gap-2 p-2">
					         <input class="form-control mr-sm-2" type="email" placeholder="E-mail" aria-label="login" name="email">
					         <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="login" name="password">
					         <div class="container col"> <button class="d-inline btn btn-outline-success my-2 my-sm-0" type="submit" name="submit_login">Login</button>
					         <a class="text-muted" href="modules/login-register.php?register=1">Register</a></div>
					         </form></ul></div>
					                
								      ';
				}
				?>
				<li class="toggle nav-item mt-2 ">
					<div class="form-check form-switch ">
						<input type="checkbox" class="form-check-input" id="darkSwitch" />
						<label class="form-check-label" for="flexSwitchCheckDefault"><span class="text-warning moon d-none" id="moon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(255,255,224)" class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
									<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
									<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
								</svg>
							</span>
							<span class="text-warning sun d-none" id="sun">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-low-fill" viewBox="0 0 16 16">
									<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8.5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z" />
								</svg>
							</span>
						</label>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>