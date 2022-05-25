<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button style="cursor:cell;" type="button" class="btn btn-sm btn-outline-secondary mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add product</button>
                <a style="font-size: 1.5rem; cursor:pointer;" onClick="window.location.reload();" class="link">
                    <span data-feather="refresh-ccw">
                    </span></a>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <input type="text" name="id" class="form-control" placeholder="Product ID" aria-label="ID" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-bag-fill"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Product name" aria-label="Product name" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-tags"></i></span>
                            <input type="text" name="price" class="form-control" placeholder="Product price" aria-label="Price" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-file-text-fill"></i></span>
                            <input type="text" name="desc" class="form-control" placeholder="Product description" aria-label="description" aria-describedby="addon-wrapping" required>
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
                $sql = $conn->query("SELECT * FROM messages");
                while ($messages = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr class="">
                         <td  class="align-middle">' . $messages['message_id'] . '</td>' .
                        '<td  class="align-middle">' . $messages['message_name'] . '</td>' .
                        '<td  class="align-middle">' . $messages['message_email'] . '</td>' .
                        '<td  class="align-middle">' . $messages['message_phone'] . '</td>' .
                        '<td  class="align-middle">' . $messages['message_date'] . '</td>' .
                        '<td class="jquery" class="align-middle">' . $messages['message_status'] . '</td>' .
                        '<td><a id="viewMessage" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class="btn btn-secondary" href=""' . $messages['message_id'] . '</a><span data-feather="eye"></span></td>' .
                        '<td><a class="btn btn-danger text-light ms-1" href="modules/delete-verify-users.php?delete=1&id=' . $messages["message_id"] . '"><span data-feather="trash-2"></span></a></td>';
                } ?>
            </tbody>
        </table>
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Reply</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $id = $_GET['id'];
                        $sql = $conn->query("SELECT * FROM messages WHERE message_id=$id");
                        $messages = $sql->fetch(PDO::FETCH_ASSOC);
                        echo $messages['message_txt'];
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</main>