<?php 
include "connection.php";
include "adminHome.php";
include "config.php";


$errors=array('email'=>'','username'=>'','phone'=>'','city'=>'','age'=>'','id'=>'');


	if (isset($_POST['submit'])) {
		
		$username = $_POST['username'];
		$id = $_POST['id'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$city = $_POST['city'];
    $age = $_POST['age'];


	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email)){
		$errors['email']="<br>Email must be valid";
	}
	if ( !preg_match('/^[A-Za-z][A-Za-z0-9]{4,11}$/', $username) ){
		$errors['username']= "<br>Username must be valid ";
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



		$sql = "INSERT INTO `users`(`id`, `username`, `telephone`, `email`, `age`,`city`) VALUES ('$id','$username','$telephone','$email','$age','$city')";



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

		$data->close();

	}
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="css/createUser.css">
    
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <style>
      .add{
        width: 650px;
        height: 640px;
        background-color: rgba(14, 68, 119, 0.8);
        margin-left: 620px;
        margin-top: 80px;
        border-radius: 10px;
        padding-left: 100px;
        padding-top: 20px;
        border: none;
        font-family: "Times New Roman", Times, serif;
        font-size: 20px;
        color: #bdb8d7;
      }
      .addUser {
        position: absolute;
        top: 40%;
        left: 64%;
        }
      </style>
<body>
<div class="add">
		<h1>Create User</h1>
	<br>
<form action="" method="POST" autocomplete="off">
  <fieldset>
    
    ID:<br>
    <input class="input" type="text" name="id" required>
    <div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['id']; ?></div>
    <br><br>
    <?php echo $lang['Username'] ?>:<br>
    <input class="input" type="text" name="username" required>
    <div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['username']; ?></div>
    <br><br>
    Email:<br>
    <input class="input" type="text" name="email" required>
    <div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['email']; ?></div>
    <br><br>
    Telephone:<br>
    <input class="input" type="text" name="telephone" required>
    <div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['phone']; ?></div>
    <br><br>
    <?php echo $lang['Age'] ?>:<br>
    <input class="input" type="text" name="age"required>
    <div class="validimi" style="font-size:14px; color:red;"><?php echo $errors['age']; ?></div>
    <br><br>
    <?php echo $lang['City'] ?>:<br>
    <input class="input" type="text" name="city" required>
    <br>
    <input id="submit" class="input" type="submit" name="submit" value="Submit" >
  </fieldset>
</form>
</div>
<img class="addUser"src="img/addu.png" width="160px" height="130px">
<div id="confirm">
	<div class="message">User Added !</div>
	     <img src='img/check.png' width="30px" >
            <button class="yes">OK</button>
         </div>
	<div id="error">
	   <div class="message1">User was not added !</div>
	     <img src='img/cancel.png' width="30px" >
            <button class="yes">OK</button>
    </div>

</body>
</html>