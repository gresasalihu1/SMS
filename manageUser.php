<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AddUser</title>
    <link rel="stylesheet" type="text/css" href="css/addUser.css">
</head>
<body>
  <h1><?php echo $lang['Add User'] ?></h1>
  <a href="createUser.php" class="button"><?php echo $lang['Add'] ?></a>

  <table>
    <tr>
      <th>ID</th>
      <th><?php echo $lang['Username'] ?></th>
      <th>Email</th>
      <th>Telephone</th>
      <th><?php echo $lang['Age'] ?></th>
      <th><?php echo $lang['City'] ?></th>
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
    </tr>";
  }
 }
?>
</table>

</body>
</html>
