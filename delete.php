<?php 
include "connection.php";
include "addUser.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM `users` WHERE `id`='$id'";
	$result = $data->query($sql);
	if ($result == TRUE) {
		echo  '<script type="text/javascript" >
		window.onload = function(){
		myFunction();
		}
		</script>';
	
	}else{
		echo '<script type="text/javascript">
		window.onload = function(){
		errori();
		}
		</script>';
	}
}

?>

<html>
	<head>
    
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
    <link rel="stylesheet" type="text/css" href="css/delete.css">
	 </head>
	 <script>
		
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
		
  
		</script>
	
	</head>
	<body>
<div id="confirm">
			<div class="message">User Deleted !</div>
			<img src='img/check.png' width="30px" >
				<button class="yes">OK</button>
			
		</div>
		<div id="error">
		<div class="message1">User was not deleted !</div>
			<img src='img/cancel.png' width="30px" >
				<button class="yes">OK</button>
		</div>
</body>
</html>