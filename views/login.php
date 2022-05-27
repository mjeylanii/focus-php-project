<?php if (!app\core\Application::isGuest()): ?>
<div class="form-register d-flex flex-column rounded-lg w-50 mx-auto text-center mt-5">
    <img class="img-fluid mx-auto" src="images/logo.png" alt="logo" width="72" height="54"><br>
    <h1 class="text-center">Login</h1>
    <form class="rounded-md p-5 mt-3 w-50 mx-auto " action="" method="POST">
        <div class="form-floating mb-2">
            <input id="floatingInput" class="form-control" type="email" name="user_email" placeholder="E-mail" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input id="floatingInput" class="form-control" type="password" name="user_password" placeholder="Password" required>
            <label for="floatingInput">Password</label>
        </div>
        <input class="btn btn-primary mt-3" type="submit" value="Login" name="submit_login">
        <p class="">No account? <a class="lead text-muted" href="/register">Register</a></p>
    </form>
</div>
<?php else: ?>

    <div class="text-center">
        <div class="alert alert-warning"><h1>You are already logged in</h1> <br>
           <h2>Please logout to login with a different account</h2>
        </div>
        <p class="lead">Redirecting you to the home page...</p>
        <?php echo ' <meta http-equiv="refresh" 
          content="3; url=/" />' ?>
    </div>

<?php endif; ?>




