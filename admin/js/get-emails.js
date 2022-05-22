(function($, window, document) {

    // The $ is now locally scoped 
   // Listen for the jQuery ready event on the document
   
   $(function() {
    var msgCount = $("#newMessage");
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "modules/new-messages.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){  
            if(response > 0)                  
          {  msgCount.html(response);
            console.log(msgCount);}
            else{
                msgCount.hide();
            }
            //alert(response);
        }
    });
  
   });
   // The rest of the code goes here!
  }(window.jQuery, window, document));

