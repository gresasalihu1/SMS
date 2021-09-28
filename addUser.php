<?php
 include "config.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AddUser</title>
   
	<link rel="stylesheet" href="css/add.css">
</head>
<body>
  <h1><?php echo $lang['Manage Users'] ?></h1>

  <table>
    <tr>
      <th>ID</th>
      <th><?php echo $lang['Username'] ?></th>
      <th>Email</th>
      <th>Telephone</th>
      <th><?php echo $lang['Age'] ?></th>
      <th><?php echo $lang['City'] ?></th>
      <th ><?php echo $lang['Update'] ?></th>
      <th><?php echo $lang['Delete'] ?></th>
<?php

include 'adminHome.php';
include 'connection.php';
$sql="select * from users";
$result=$data->query($sql);
 if($result->num_rows>0){
   while($row=$result->fetch_assoc()){
    echo "
    <tr>
    <td>".$row["id"]."</td>
    <td>".$row["username"]."</td>
    <td>".$row["email"]."</td>
    <td>".$row["telephone"]."</td>
    <td>".$row["age"]."</td>
    <td>".$row["city"]."</td>
    <td id='button1'><a class='button1' href='update.php?id=$row[id]'>Edit<img src='img/pencil1.png ' style='position:absolute; right:150px; width:18px; height:16px;' /></a></td>
    <td id='button2'><a href='delete.php?id=$row[id]'>Delete<img src='img/delete.png ' style='position:absolute; right:20px; width:18px; height:16px;' /></a></td>
    </tr>";
  }
 }
?>
</table>

</body>
</html>

