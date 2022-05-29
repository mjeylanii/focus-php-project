<?php if (\app\core\Application::$app->session->getFlash('sent')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h3><?php echo @\app\core\Application::$app->session->getFlash('sent') ?></h3>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (\app\core\Application::$app->session->getFlash('sendfail')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h3><?php echo @\app\core\Application::$app->session->getFlash('sendfail') ?></h3>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<h1 class="text-center">Contact us</h1>
<div class="form-register d-flex flex-column rounded-lg mx-auto text-center">
    <form class="rounded-md mt-2 p-5 rounded w-50  mx-auto" action="/contact" method="POST">
        <div class="input-group my-2">
            <input type="text" class="form-control" placeholder="Name" name="message_name">
        </div>
        <div class="input-group col-md-12 my-2">
            <input type="text" class="form-control" placeholder="Email" name="message_email">
        </div>
        <div class="input-group col-md-12 my-2">
            <input type="tel" class="form-control" placeholder="Phone" name="message_phone">
        </div>
        <div class="input-group col-md-12 my-2">
            <textarea class="form-control" placeholder="Message" rows="5" id="comment"
                      name="message_txt"></textarea>
        </div>
        <div class="form-floating mx-auto col-4">
            <input class="btn btn-lg btn-success ms-5" type="submit" value="Send" name="send_msg">
        </div>
    </form>
</div>