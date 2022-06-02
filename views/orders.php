<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order</h1>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Order details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i data-feather="hash">Order</i></span>
                            <input id="orderId" type="text" name="orderId" class="form-control" placeholder="Order ID"
                                   aria-label="ID"
                                   aria-describedby="addon-wrapping" required disabled>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i data-feather="user">User</i></span>
                            <input id="userId" type="text" name="user_id" class="form-control" placeholder="User ID"
                                   aria-label="ID"
                                   aria-describedby="addon-wrapping" required disabled>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i data-feather="user"></i></span>
                            <input id="userName" type="text" name="user_name" class="form-control"
                                   placeholder="User Name"
                                   aria-label="Product name" aria-describedby="addon-wrapping" required disabled>
                        </div>

                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i data-feather="shopping-bag"></i></span>
                            <input id="productName" type="text" name="product_name" class="form-control"
                                   placeholder="Product name"
                                   aria-label="Price" aria-describedby="addon-wrapping" required disabled>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><i
                                        data-feather="credit-card"></i></span>
                            <input type="text" name="payment_type" class="form-control" placeholder="Payment type"
                                   aria-label="description" aria-describedby="addon-wrapping" id="paymentType" required
                                   disabled>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">  <i data-feather="calendar"></i></span>
                            <input id="orderDate" type="text" name="order_date" class="form-control"
                                   placeholder="Payment type"
                                   aria-label="description" aria-describedby="addon-wrapping" required disabled>
                        </div>
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
                <th scope="col">Order #</th>
                <th scope="col">User ID #</th>
                <th scope="col">Payment ID</th>
                <th scope="col">Product ID</th>
                <th scope="col">Checkout date</th>
                <th scope="col">View details</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $orders = $params;
            foreach ($orders as $key => $order) {
                echo '
                     <tr class="">
                     <td  class="align-middle">' . $order['order_id'] . '</td>' .
                    '<td  class="align-middle">' . $order['user_id'] . '</td>' .
                    '<td  class="align-middle">' . $order['payment_id'] . '</td>' .
                    '<td  class="align-middle">' . $order['product_id'] . '</td>' .
                    '<td  class="align-middle">' . $order['order_date'] . '</td>' .
                    '<td class="align-middle"><button data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="btn btn-secondary text-light ms-1 viewOrder" value="' . $order["order_id"] . '"><span data-feather="eye"></span></button></td>';
            }
            ?>
            </tbody>
        </table>
</main>
<script src="js/order_controller.js"></script>
