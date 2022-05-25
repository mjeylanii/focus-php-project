<h1 class="text-center">Contact us</h1>
<div class="form-register d-flex flex-column rounded-lg mx-auto text-center">
    <form class="rounded-md mt-2 p-5 rounded w-50  mx-auto" action="/contact" method="POST">
        <div class="input-group my-2">
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="input-group col-md-12 my-2">
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="input-group col-md-12 my-2">
            <input type="tel" class="form-control" placeholder="Phone" name="num">
        </div>
        <div class="input-group col-md-12 my-2">
            <textarea class="form-control" placeholder="Massage" rows="5" id="comment"
                      name="msg"></textarea>
        </div>
        <div class="form-floating mx-auto col-4">
            <input class="btn btn-lg btn-success ms-5" type="submit" value="Send" name="send_msg">
        </div>
    </form>
</div>