<?php 


$errors='';
include 'connection.php';
include "config.php";
if(!isset($_SESSION)) 
 { 
     session_start(); 
 }
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$sql="select * from login1  where username='$username' AND password='$password' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);
	if ($row==0){
		$errors= "Incorrect username or password";
	}
	else{
		$_SESSION["username"]=$row["username"];
		$_SESSION["password"]=$row["password"];
		$_SESSION["email"]=$row["email"];
		$_SESSION["phone"]=$row["phone"];
		$_SESSION["usertype"]=$_row["usertype"];
		header("location:homea.php");

	 
	}		

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login-SMS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	<div class="container">
		
		<div class="login-content">
			<form action="#" method="POST" autocomplete="off">
				<img src="img/avatar.png" ">
				<h2 class="title">Sign in</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		<input type="text" name="username" class="input" placeholder="Username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="password" class="input" placeholder="Password" required>
            	   </div>
            	</div>
				<div style=" font-size: 14px; color: red;"><?php echo $errors; ?></div>
            	<a href="#">Forgot Password ?</a>
            	<input name="submit" type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>