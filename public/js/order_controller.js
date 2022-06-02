$(document).ready(function () {

    $(".viewOrder").click(function () {
        fetchOrder($(this).val());
    });

 /*   $(".productDeleteBtn").click(function () {
        deleteProduct($(this).val());
    });*/
});

function fetchOrder(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/orders",
        data: {
            fetch_orders: 1,
            order_id: id
        },
        dataType: "json",   //expect html to be returned
        success: function (response) {
            console.log(response);
            $("#orderId").val(response.order_id);
            $("#userId").val(response.user_id);
            $("#userName").val(response.user_firstname + ' ' + response.user_lastname) ;
            $("#productName").val(response.product_name);
            $("#productPrice").val(response.product_price);
            $("#paymentType").val(response.payment_type);
            $("#orderDate").val(response.order_date);
        }
    });

}

function deleteProduct(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/products",
        data: {
            product_id: id,
            delete_product: 1
        },
        dataType: "",   //expect html to be returned
        success: function (response) {
            console.log(response);
            /*location.reload();*/
        }
    });

}
