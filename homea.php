
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include "config.php";
 if($_SESSION['username']=="admin"){
    include 'adminHome.php';
    }
  else{
    include 'userHome.php';
  }
    

?>
<html lang="en">
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
    <body>
        <div class="container">
    <h1><?php echo $lang['Welcome'] ?></h1>
    <h3><?php echo $lang['User Management System'] ?></h3>
    <p class="p1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>Sed aspernatur numquam sapiente, blanditiis<br> asperiores tempore dicta. Architecto sint <br>perspiciatis unde.</p>
    <p class="p2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>Sed aspernatur numquam sapiente, blanditiis<br> asperiores tempore dicta. Architecto sint <br>perspiciatis unde.</p>
    <p class="p3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br>Sed aspernatur numquam sapiente, blanditiis<br> asperiores tempore dicta. Architecto sint <br>perspiciatis unde.</p>
    <img src="img/homee.jpg" width="520px" height="300px">
    <button class="button"><?php echo $lang['Learn More'] ?></button>
</div>
</body>
</html>