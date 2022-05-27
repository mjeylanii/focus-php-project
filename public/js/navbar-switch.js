(function ($, window, document) {

    // The $ is now locally scoped 

    // Listen for the jQuery ready event on the document
    $(function () {
        var navbar = $("#navbar");
        var darkSwitch = $("#darkSwitch");
        var sun = $("#sun");
        var moon = $("#moon");
        var inputText = $("#floatingtext");
        var dropdown = $("#dropdown");
        if (darkSwitch.checked) {

            inputText.addClass("text-dark");
            navbar.removeClass("navbar-light bg-light").addClass("navbar-dark");
            sun.addClass("d-none");
            moon.removeClass("d-none");
            console.log("checked")
        } else {
            moon.addClass("d-none");
            sun.removeClass("d-none");
            navbar.removeClass("navbar-dark").addClass("navbar-light");
        }
        $(darkSwitch).on('change', function () {
            if (this.checked) {
                dropdown.addClass("dropdown-menu-dark");
                navbar.removeClass("navbar-light").addClass("navbar-dark");
                sun.addClass("d-none");
                moon.removeClass("d-none");
                console.log("checked")
            } else {
                dropdown.removeClass("dropdown-menu-dark")
                moon.addClass("d-none");
                sun.removeClass("d-none");
                navbar.removeClass("navbar-dark").addClass("navbar-light");
            }
        });

    });

    // The rest of the code goes here!

}(window.jQuery, window, document));