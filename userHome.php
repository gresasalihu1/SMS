<?php
include "config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Staff Management System</title>
	<link rel="stylesheet" href="css/style1.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        #nje{
            display:inline;
        }
        </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Staff Management System</h2>
        <ul>
            <li><a href="homea.php"><i class="fas fa-home"></i><?php echo $lang['home'] ?></a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i><?php echo $lang['profile'] ?></a></li>
            <li><a href="contact.php"><i class="fas fa-address-book"></i><?php echo $lang['Contact'] ?></a></li>
            <li ><a id="nje" href="homea.php?lang=en"><i class="fa fa-globe" ></i> English</a><a id="nje"href="homea.php?lang=al"> | Shqip</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><?php echo $lang['Logout'] ?></a></li>
        </ul> 

    </div>
    
</div>



</>



</body>
</html>