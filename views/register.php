<div class="form-register d-flex flex-column w-100 text-center mt-5">
    <img class="img-fluid mx-auto bg-light" src="images/logo.png" alt="logo" width="72" height="54">
    <form class="rounded-md mt-2 p-5 rounded w-50 mx-auto " action="" method="POST">
        <div class="row">
            <div class="col">
            <div class="form-floating mb-2">
                <input id="floatingInput" class="form-control" type="text" name="firstname" placeholder="Name" required>
                <label id="floatingtext" for="floatingInput">First name</label>
            </div>
            </div>
            <div class="col">
            <div class="form-floating mb-2">
                <input id="floatingInput" class="form-control" type="text" name="lastname" placeholder="Surname" required>
                <label id="floatingtext" for="floatingInput">Last name</label>
            </div>
        </div>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput bg-light" class="form-control" type="email" name="email" placeholder="E-mail"
                   required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput" class="form-control" type="password" name="password" placeholder="Password" required>
            <label for="floatingInput">Password</label>
        </div>
        <div class="form-floating mb-2">
            <input id="floatingInput" class="form-control" type="password" name="passwordConfirm" placeholder="Re-enter password" required>
            <label for="floatingInput">Confirm password</label>
        </div>
        <input class="btn btn-primary mb-1 mt-3" type="submit" value="Register" name="submit_registration">
        <p class="">Have an account? <a class="lead text-body" href="/login">Login</a></p>
    </form>
</div>

