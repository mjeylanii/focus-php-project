<?php if (\app\core\Application::$app->session->getFlash('success')): ?>
    <div class="text-center">
        <div class="alert alert-success text-center fw-bolder">
            <?php echo \app\core\Application::$app->session->getFlash('success') ?>
        </div>
        <h1 class="display-3">Thank you for registering</h1>
        <br>
        <p class="text-lead">Redirecting to home page...</p>
        <?php echo ' <meta http-equiv="refresh"
          content="4; url = home" />' ?>
    </div>
<?php else: ?>
    <div class="text-center">
        <div class="alert alert-warning text-center fw-bolder">
            <h3>
                <?php echo \app\core\Application::$app->session->getFlash('fail_register'); ?>
            </h3>
            <br>  <p class="text-lead">Try logging in <a href="/login">Login</a> Or register with another E-mail <a href="/register">Register</a></p>
        </div>
    </div>

<?php endif; ?>

