$(document).ready(function () {

    $(".productUpdateBtn").click(function () {
        fetchProduct($(this).val());
    });

    $(".productDeleteBtn").click(function () {
        deleteProduct($(this).val());
    });
});

function fetchProduct(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/products",
        data: {
            fetch_product: 1,
            product_id: id
        },
        dataType: "json",   //expect html to be returned
        success: function (response) {
            console.log(response);
            $("#product_id").val(response.product_id);
            $("#product_name").val(response.product_name);
            $("#product_price").val(response.product_price);
            $("#product_details").val(response.product_details);
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
