$(document).ready(function () {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/messages",
        data: {ajaxreq: 1},
        dataType: "json",
        success: function (response) {
            $("#newMessage").html(Object.keys(response).length);

        }
    });

    $(".viewBtn").click(function () {
        fetchData($(this).val());

    });
    $(".deleteBtn").click(function () {
        deleteMessage($(this).val());
    });
});

function fetchData(id) {
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

}

function deleteMessage(id) {
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/messages",
        data: {
            message_id: id,
            delete_message: 1
        },
        dataType: "",   //expect html to be returned
        success: function (response) {
        location.reload();
        }
    });

}
