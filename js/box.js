	  
function myFunction(msg, myYes){
         var confirmBox = $("#confirm");
         confirmBox.find(".message").text(msg);
         confirmBox.find(".yes").unbind().click(function() {
            confirmBox.hide();
         });
         confirmBox.find(".yes").click(myYes);
         confirmBox.show();
      }
      function errori(msg, myYes){
         var confirmBox = $("#error");
         confirmBox.find(".message1").text(msg);
         confirmBox.find(".yes").unbind().click(function() {
            confirmBox.hide();
         });
         confirmBox.find(".yes").click(myYes);
         confirmBox.show();
      }


