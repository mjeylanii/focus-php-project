<div class="text-center">
    <?php if(\app\core\Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success text-center fw-bolder">
            <?php echo \app\core\Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <h1 class="display-3">Thank you for registering</h1>
    <br>
    <p class="text-lead">Redirecting to home page...</p>
    <?php echo ' <meta http-equiv="refresh" 
          content="4; url = home" />' ?>
</div>

