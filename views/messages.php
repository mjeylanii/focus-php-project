<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php if (\app\core\Application::$app->session->getFlash('deleted')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h3><?php echo @\app\core\Application::$app->session->getFlash('deleted') ?></h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (\app\core\Application::$app->session->getFlash('notdeleted')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h3><?php echo @\app\core\Application::$app->session->getFlash('notdeleted') ?></h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Messages</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a style="font-size: 1.5rem; cursor:pointer;" onClick="window.location.reload();" class="link">
                    <span data-feather="refresh-ccw">
                    </span></a>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Reply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list-ol"></i></span>
                            <input type="text" name="id" class="form-control" placeholder="Product ID" aria-label="ID"
                                   aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-bag-fill"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Product name"
                                   aria-label="Product name" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-tags"></i></span>
                            <input type="text" name="price" class="form-control" placeholder="Product price"
                                   aria-label="Price" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i
                                        class="bi bi-file-text-fill"></i></span>
                            <input type="text" name="desc" class="form-control" placeholder="Product description"
                                   aria-label="description" aria-describedby="addon-wrapping" required>
                        </div>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Send</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal end-->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone#</th>
                <th scope="col">Date-Time</th>
                <th scope="col">Status</th>
                <th scope="col">View</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $messages = $params;
            foreach ($messages as $message) {
                echo '
                    <tr class="">
                     <td  class="align-middle">' . $message['message_id'] . '</td>' .
                    '<td  class="align-middle">' . $message['message_name'] . '</td>' .
                    '<td  class="align-middle">' . $message['message_email'] . '</td>' .
                    '<td  class="align-middle">' . $message['message_phone'] . '</td>' .
                    '<td  class="align-middle">' . $message['message_date'] . '</td>' .
                    '<td class="jquery" class="align-middle">' . $message['message_status'] . '</td>' .
                    '<td><button  data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class="btn btn-secondary viewBtn" value="' . $message['message_id'] . '"><span data-feather="eye"></span> </button></td>' .
                    '<td><button class="btn btn-danger text-light ms-1 deleteBtn" value="' . $message['message_id'] . '"><span data-feather="trash-2"></span></button></td>';
            } ?>
            </tbody>
        </table>
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Read message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-1 px-3" action="" method="GET">
                            <div class="input-group ">
                                <span class="input-group-text " id="basic-addon1">Name&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <input id="sender_name" type="text" class="form-control disabled" placeholder="Name"
                                       name="name"
                                       disabled readonly>
                            </div>
                            <div class="input-group col-md-12">
                                <span class="input-group-text"
                                      id="basic-addon1">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <input id="sender_email" type="text" class="form-control" placeholder="Email"
                                       name="email"
                                       disabled readonly>
                            </div>
                            <div class="input-group col-md-12">
                                <span class="input-group-text" id="basic-addon1">Phone&nbsp;&nbsp;&nbsp;</span>
                                <input id="sender_phone" type="tel" class="form-control" placeholder="Phone" name="num"
                                       disabled readonly>
                            </div>
                            <div class="input-group col-md-12">
                                <span class="input-group-text" id="basic-addon1">Message</span>
                                <textarea id="sender_message" disabled class="form-control" placeholder="Message"
                                          rows="5"
                                          name="msg"></textarea disabled readonly>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
</main>