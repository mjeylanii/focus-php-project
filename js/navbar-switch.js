$(document).ready(function() {
    var navbar = document.getElementById("navbar");
    var darkSwitch = document.getElementById("darkSwitch");
    if (darkSwitch.checked) {
        $("#navbar").removeClass("navbar-light").addClass("navbar-dark");
        $("#sun").addClass("d-none");
        $("#moon").removeClass("d-none");
    }
    $('input:checkbox').on('change', function() {
        if (darkSwitch.checked) {
            $("#navbar").removeClass("navbar-light").addClass("navbar-dark");
            $("#sun").addClass("d-none");
            $("#moon").removeClass("d-none");
        } else {
            $("#moon").addClass("d-none");
            $("#sun").removeClass("d-none");
            $("#navbar").removeClass("navbar-dark").addClass("navbar-light");
            console.log("unchecked");
        }
    });

});