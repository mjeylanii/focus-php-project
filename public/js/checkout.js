$(function () {
    checkoutBtn = $("#proceedCheckout");
    $(".add").on('click', function () {
        localStorage.setItem('product_id', $(this).val());
        checkoutBtn.removeClass("d-none");
        $.ajax({    //create an ajax request to display.php
            type: "GET",
            url: "/products",
            data: {product_id: parseInt(localStorage.getItem("product_id"))},
            dataType: "json",   //expect html to be returned
            success: function (response) {
                let productId = response.product_id;
                let productName = response.product_name;
                let productPrice = response.product_price;
                let productDetails = response.product_details;
                localStorage.setItem('product_id', productId);
                localStorage.setItem('product_name', productName);
                localStorage.setItem('product_price', productPrice);
                localStorage.setItem('product_details', productDetails);
            }
        });
    });
})
