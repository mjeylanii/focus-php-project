<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add product</button>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
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


</main>
<?php
if (isset($_POST['id'])) {
    $id = @$_POST['id'];
    $name = @$_POST['name'];
    $price = @$_POST['price'];
    $desc = @$_POST['desc'];
    $data = [
        $id,
        'name' => $name,
        $price,
        'desc' => $desc
    ];
    echo '<script> alert("' . '$data[0]' . '")</script;';
    $sql = "INSERT INTO products(product_id, product_name, product_price, product_details) VALUES(:id, :name, :price, :desc)";
    $stmt = $conn->prepare($sql);
    $stmt->exec($sql);
    echo '<script>alert("Success!");</script>';
} else {
}
?>