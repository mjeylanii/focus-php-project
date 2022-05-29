<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button style="cursor:cell;" type="button" class="btn btn-sm btn-outline-secondary mx-3"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add product
                </button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Add product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/products" method="POST">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list-ol"></i></span>
                            <input type="text" name="product_id" class="form-control" placeholder="Product ID"
                                   aria-label="ID"
                                   aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-bag-fill"></i></span>
                            <input type="text" name="product_name" class="form-control" placeholder="Product name"
                                   aria-label="Product name" aria-describedby="addon-wrapping" required>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-tags"></i></span>
                            <input type="text" name="product_price" class="form-control" placeholder="Product price"
                                   aria-label="Price" aria-describedby="addon-wrapping" required>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i
                                        class="bi bi-file-text-fill"></i></span>
                            <input type="text" name="product_details" class="form-control"
                                   placeholder="Product description"
                                   aria-label="description" aria-describedby="addon-wrapping" required>
                        </div>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button name="submit" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal end-->
    <?php if (\app\core\Application::$app->session->getFlash('added')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h3><?php echo @\app\core\Application::$app->session->getFlash('added') ?></h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (\app\core\Application::$app->session->getFlash('notadded')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h3><?php echo @\app\core\Application::$app->session->getFlash('notadded') ?></h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Detail</th>
                <th scope="col">Update Details</th>
                <th scope="col">Delete product
                </th>
            </tr>
            </thead>
            <tbody>
         <?php
               $product = $params;
             foreach ($product as $key => $products) {
                 echo '
                      <tr class="">
                      <td  class="align-middle">' . $products['product_id'] . '</td>' .
                     '<td  class="align-middle">' . $products['product_name'] . '</td>' .
                     '<td  class="align-middle">$' . $products['product_price'] . '</td>' .
                     '<td  class="align-middle">' . $products['product_details'] . '</td>' .
                     '<td><a class="btn btn-secondary" href="products?id="' . $products['product_id'] . '</a><span data-feather="edit"></span></td>' .
                     '<td><a class="btn btn-danger text-light ms-1" href="products?id=' . $products["product_id"] . '"><span data-feather="trash-2"></span></a></td></tr>';
             } ?>
            </tbody>
        </table>
</main>

