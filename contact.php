<?php
include("userHome.php");
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
require 'phpmailer/vendor/autoload.php';
?>
<?php
if(!isset( $_SESSION)){
    session_start();
}
if (isset($_POST['send'])){

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$mail = new PHPMailer;                             
$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                              
$mail->Username = '';                 
$mail->Password = '';                          
$mail->SMTPSecure = 'ssl';                           
$mail->Port = 465;  
$mail->setFrom($email, 'SMS-Staff Management System');
$mail->addAddress('', "Admin"); 
$mail->addReplyTo($email,$name);
$mail->isHTML(true);                                  
$mail->Subject = $subject;
$mail->Body    =$message;
$mail->AltBody = $message;
if(!$mail->send()) {
    echo '<script type="text/javascript">
		window.onload = function(){
		errori();
		}
		</script>';
    
} else {    
    echo  '<script type="text/javascript" >
    window.onload = function(){
    myFunction();
    }
    </script>';
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    
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
</head>
<body>
    <div class="send">
        <h1><?php echo $lang['Contact Us'] ?></h1>
        <form action="" method="POST" autocomplete="off">
            <label for="name"><?php echo $lang['Name'] ?>:</label>
            <br>
            <input class="input" type="text" name="name" id="name" value="<?php echo $_SESSION['username'] ;?>" readonly>
            <br><br>
            <label for="email">Email:</label><br>
            <input class="input" type="email" name="email" id="email" value="<?php echo $_SESSION['email'] ;?>" readonly>
            <br><br>
            <label  id="subject" for="subject"><?php echo $lang['Subject'] ?>:</label>
            <br>
            <input class="input" type="text" name="subject" id="subject" required>
            <br><br>
            <label for="message"><?php echo $lang['Message'] ?>:</label><br>
            <textarea id="message" name="message" cols="20" rows="3" required></textarea>
            <br><br>
            <input id="send" type="submit" value="<?php echo $lang['Send'] ?>" name="send">
            <label id="hidden"></label> 
            <img src="img/send.png" width="120px" height="100px">

        
        </form>
    </div>   
    <div id="confirm">
	<div class="message">We accepted your email ! We will respond within 24 hours.</div>
	     <img src='img/check.png' width="30px" >
            <button class="yes">OK</button>
         </div>
	<div id="error">
	   <div class="message1"> Unable to send emails !</div>
	     <img src='img/cancel.png' width="30px" >
            <button class="yes">OK</button>
    </div>
</body>
</html>
