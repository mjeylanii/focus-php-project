(function($, window, document) {

    // The $ is now locally scoped 

   // Listen for the jQuery ready event on the document
   $(function() {
    var navbar = $("#navbar");
    var darkSwitch = $("#darkSwitch");
    var sun =   $("#sun");
    var moon = $("#moon");
    if(darkSwitch.checked){
        navbar.removeClass("navbar-light bg-light").addClass("navbar-dark");
        sun.addClass("d-none");
        moon.removeClass("d-none");
        console.log("checked")
    }else{
        moon.addClass("d-none");
        sun.removeClass("d-none");
        navbar.removeClass("navbar-dark").addClass("navbar-light");
        console.log("unchecked");
    }
    $(darkSwitch).on('change', function() {
        if (this.checked) {
         navbar.removeClass("navbar-light").addClass("navbar-dark");
         sun.addClass("d-none");
         moon.removeClass("d-none");
         console.log("checked")
        } else {
           moon.addClass("d-none");
           sun.removeClass("d-none");
           navbar.removeClass("navbar-dark").addClass("navbar-light");
           console.log("unchecked");
        }
    });

   });

   // The rest of the code goes here!

  }(window.jQuery, window, document));