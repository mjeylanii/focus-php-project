<?php
include('config.php');
if (isset($_GET['productId'])) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stm->execute([$productId]);
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

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