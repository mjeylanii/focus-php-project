<div class="form-register d-flex flex-column w-100 text-center mt-5">
    <div class="text-center">
        <?php if (\app\core\Application::$app->session->getFlash('failreigster')):?>
            <div class="alert alert-success text-center fw-bolder">
                <?php echo \app\core\Application::$app->session->getFlash('failregister') ?>
            </div>
        <?php endif; ?>
    </div>
    <img class="img-fluid mx-auto bg-light" src="images/logo.png" alt="logo" width="72" height="54">
    <form class="rounded-md mt-2 p-5  w-50 mx-auto " action="" method="POST">

        <div class="row">

            <div class="col">

                <div class="form-floating mb-2">
                    <input id="floatingInput"
                           class="form-control ?>"
                           type="text" name="user_firstname"
                           placeholder="Name" value="<?php echo @$model->user_firstname ?>" required ">
                    <label id="floatingtext" for="floatingInput">First name</label>
                    <div class="invalid-feedback">

                    </div>
                </div>

            </div>
            <div class="col">
                <div class="form-floating mb-2">
                    <input id="floatingInput"
                           class="form-control"
                           type="text" name="user_lastname"
                           value="<?php echo @$model->user_lastname ?>" placeholder="Surname"
                           required>
                    <label id="floatingtext" for="floatingInput">Last name </label>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput bg-light"
                   class="form-control "
                   value="<?php ?>"
                   type="email" name="user_email" placeholder="E-mail"
                   required>
            <label for="floatingInput">Email</label>
            <div class="invalid-feedback">

            </div>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput"
                   class="form-control"
                   type="password" name="user_password" placeholder="Password - minimum 8 characters" pattern=".{8,}"
                   required>
            <label for="floatingInput">Password - minimum 8 characters</label>
            <div class="invalid-feedback">

            </div>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput"
                   class="form-control"
                   type="password" name="passwordConfirm"
                   placeholder="Re-enter password" pattern=".{8,}" required>
            <label for="floatingInput">Confirm password</label>
            <div class="invalid-feedback">

            </div>
        </div>
        <input class="btn btn-primary mb-1 mt-3" type="submit" value="Register" name="submit_registration">
        <input class="btn btn-danger mb-1 mt-3" type="reset" value="reset" name="reset_field">
        <p class="">Have an account? <a class="lead text-body" href="/login">Login</a></p>
    </form>
</div>

<!--<form class="rounded-md mt-2 p-5  w-50 mx-auto " action="" method="POST">-->