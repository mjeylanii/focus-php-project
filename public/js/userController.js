$(document).ready(function () {
    $(".userVerify").click(function () {
        verifyUser($(this).val());
    });

    $(".userDelete").click(function () {
        deleteUser($(this).val());
    });
});

/*function fetchData(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/messages",
        data: {message_id: id},
        dataType: "json",   //expect html to be returned
        success: function (response) {
            $("#sender_name").val(response.message_name);
            $("#sender_email").val(response.message_email);
            $("#sender_phone").val(response.message_phone);
            $("#sender_message").val(response.message_txt);
        }
    });

}*/

function deleteUser(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/users",
        data: {
            user_id: id,
            delete_user: 1
        },
        dataType: "html",   //expect html to be returned
        success: function (response) {
            alert(response);
            location.reload();
        }
    });

}

function verifyUser(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/users",
        data: {
            user_id: id,
            verify_user: 1
        },
        dataType: "html",   //expect html to be returned
        success: function (response) {

           /* location.reload();*/
        }
    });

}

