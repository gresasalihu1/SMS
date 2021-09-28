<?php 
include "connection.php";
include "adminHome.php";
include "config.php";
$errors=array('email'=>'','username'=>'','phone'=>'','city'=>'','age'=>'','id'=>'');

	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$id = $_POST['id'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$age = $_POST['age'];
		$city = $_POST['city'];

        if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email)){
			$errors['email']="<br>Email must be valid";
		}
		if(!preg_match('@[0-9]@', $telephone) || strlen($telephone) != 9)
		{
			$errors['phone']= "<br>Number must be valid";
		}
	  if(!preg_match('@[0-9]@', $age))
		{
		  $errors['age']= "<br>Age must be a number";
		}
		if(!preg_match('@[0-9]@', $id))
		{
		  $errors['id']= "<br>Age must contain only numbers";
		}
		if(array_filter($errors))
		{
			
 
	 }
	 else{
		$sql = "UPDATE users SET `id`='$id',`username`='$username',`telephone`='$telephone',`email`='$email',`age`='$age',city='$city'  WHERE `id`='$id'";

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
}


if (isset($_GET['id'])) {
	$id = $_GET['id'];

	
	$sql = "SELECT * FROM `users` WHERE `id`='$id'";


	$result = $data->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$username = $row['username'];
			$email = $row['email'];
			$telephone = $row['telephone'];
			$id  = $row['id'];
			$age = $row['age'];
			$city = $row['city'];
		}

	?>
    <!DOCTYPE html>
    <html>
	<head>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="css/update.css">
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
		<div class="update">
		<h1><?php echo $lang['Update User'] ?></h1>
	    <br>
		 <form action="" method="post" autocomplete="off">
		  <fieldset>
		    <label><?php echo $lang['Username'] ?>:</label><br>
		    <input  class="input" type="text" name="username" value="<?php echo $username;?> ">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['id']; ?></div>
		    <br><br>
		    <label>Email:</label><br>
		    <input  class="input" type="text" name="email" value="<?php echo $email; ?>">
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['email']; ?></div>
		    <br><br>
		    <label>Telephone:</label><br>
		    <input  class="input" type="text" name="telephone" value="<?php echo $telephone; ?>">
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['phone']; ?></div>
		    <br><br>
		    <label><?php echo $lang['Age'] ?>:</label><br>
		    <input  class="input" type="text" name="age" value="<?php echo $age; ?>">
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['age']; ?></div>
		    <br><br>
		    <label><?php echo $lang['City'] ?>:</label><br>
            <input  class="input" type="text" name="city" value="<?php echo $city; ?>">
		    <br><br>
		    <input id="update"  type="submit" value="<?php echo $lang['Update'] ?>" name="update">
		  </fieldset>
		</form>
			</div>
        <img src="img/updateuu.png" width="170px" height="130px">
		<div id="confirm">
			<div class="message">User Updated !</div>
			<img src='img/check.png' width="30px" >
				<button class="yes">OK</button>
		</div>
		<div id="error">
		<div class="message1">User was not updated !</div>
			<img src='img/cancel.png' width="30px" >
				<button class="yes">OK</button>
		</div>
		</body>
		</html>




	<?php
	} else{
		header('Location: homea.php');
	}

}
?>