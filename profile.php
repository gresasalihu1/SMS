<?php
include("connection.php");
include ("config.php");


$errors=array('email'=>'','password'=>'','phone'=>'');
if (isset($_POST['update'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$username = str_replace(' ', '', $username);

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email)){
		$errors['email']="<br>Email must be valid";
	}
	if (!$uppercase || !$lowercase || !$number || strlen($password) < 8){
		$errors['password']= "<br>Password must contain numbers,uppercase,lowercase and 8+ characters";
	} 
	if(!preg_match('@[0-9]@', $phone) || strlen($phone) != 9)
    {
        $errors['phone']= "<br>Number must be valid";
    }


	if(array_filter($errors))
	   {
		   

	}
	else{

	$sql = "UPDATE login1 SET `email`='$email',`phone`='$phone',`password`='$password',`username`='$username'  WHERE `username`='$_SESSION[username]'";

	
	$result = $data->query($sql);

	  if ($result == TRUE) {
		$_SESSION["username"]=str_replace(' ', '', $username);
		$_SESSION["email"]=$email;
		$_SESSION["phone"]=$phone;
		$_SESSION["password"]=$password;
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
?>

<?php 

 
if($_SESSION["username"]=="admin"){
	include "adminHome.php";
}
else{
	include "userHome.php";
}

?>
<html lang="en">
    <head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="css/profile.css">
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
	
	<div class="update">
		<h1><?php echo $lang['profile'] ?></h1>
	<br>
       <form action="" method="post" autocomplete="off">
		  <fieldset>
		  <label><?php echo $lang['Username'] ?>:</label><br>
		    <input class="input" type="text" name="username" value="<?php echo $_SESSION["username"] ?> " >
		    <br><br>
			<label>Email: </label><br>
		    <input class="input" type="text" name="email" value="<?php echo $_SESSION["email"]; ?>" required>
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['email']; ?></div>
		    <br><br>
			<label>Telephone: </label><br>
		    <input class="input" type="text" name="phone" value="<?php echo $_SESSION["phone"]; ?>" required>
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['phone']; ?></div>
		    <br><br>
			<label><?php echo $lang['Password'] ?>: </label><br>
		    <input class="input" type="password" name="password" value="<?php echo $_SESSION["password"]; ?>" required>
			<div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['password']; ?></div>
		    <br><br>
		    <input type="submit" value="<?php echo $lang['Update'] ?>" name="update" id="update">
		  </fieldset>
		</form>
	</div>
	<img class="imgprofile "src="img/profile1.png" width="150px" height="120px">
	<div id="confirm">
	<div class="message">Data Updated !</div>
	     <img src='img/check.png' width="30px" >
            <button class="yes">OK</button>
         </div>
	<div id="error">
	   <div class="message1">Data was not updated !</div>
	     <img src='img/cancel.png' width="30px" >
            <button class="yes">OK</button>
    </div>
	
	
    
</body>
</html>