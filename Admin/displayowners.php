<!DOCTYPE html>
<?php session_start();
if(!$_SESSION['loggedin'])
{
header("Location:../login.php");
exit;
}
else{
  $user = $_SESSION['loggedin'];
  $pass = $_SESSION['pass'];
  $q = "SELECT * from `Admin` where `adminUser` = '$user' and `adminPass` = '$pass'";
  $link = mysqli_connect('localhost','pma','','chainStores');
  $run = mysqli_query($link, $q);
  $n = mysqli_num_rows($run);
  if($n == 0){
    header("Location:../login.php");
    exit;
  }
}
?>
<title>Display Owners</title>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
<style>
</style>
</head>
<body>
   <p>
   <h1>Chain Store Management System</h1>
   <h3></h3>
   </p>
    <ul>
      <li><a href="index.php">Admin</a></li>
      <li><a href="store.php">Store</a></li>
      <li><a class="active" href="owner.php">Owner</a></li>
      <li><a href="profit.php">Profit</a></li>
      <li><a href="model.php">Model</a></li>
      <li style="float:right"><a class="active1" href="../logout.php">Logout</a></li>
   </ul>
  <ul class = "vertical">
    <li class = "vertical"><a href="addowner.php">Add Owner</a></li>
    <li class = "vertical"><a href="deleteowner.php">Delete Owner</a></li>
    <li class = "vertical"><a href="ownerdetails.php">Owner Details</a></li>
    <li class = "vertical"><a class = "active3" href="displayowners.php">Display Owners</a></li>
  </ul>
  <h3>Display Owners</h3>

</body>
<?php
if(1){
  $link = mysqli_connect('localhost','pma','','chainStores');
  $user = $_SESSION['loggedin'];
  $query = "SELECT * from `Owners`";
  $query_run = mysqli_query($link, $query);
  while($data = mysqli_fetch_assoc($query_run)){
    echo '<p><hr><hr> Owner Details - Owner Id : '.$data['ownerId'].', Store Id : '.$data['storeId'].', Owner Username : '.$data['ownerUsername'].', Owner Name '.$data['ownerName'].'</p>';
  //   $store = $data['storeId'];
  //   $query2 = "SELECT * from `Owners` where `storeId` = '$store'";
  //   $query_run2 = mysqli_query($link, $query2);
  //   echo '<hr>Owners: ';
  //   $i = 1;
  //   while($data2 = mysqli_fetch_assoc($query_run2)){
  //     echo '<p>('.$i.') Owner Id - '.$data2['ownerId'].', Owner Name - '.$data2['ownerName'].'</p>';
  //   }
  //   $query3 = "SELECT * from `Rcpts` where `storeId` = '$store'";
  //   $query_run3 = mysqli_query($link, $query3);
  //   echo '<hr>Receptionists: ';
  //   $i = 1;
  //   while($data3 = mysqli_fetch_assoc($query_run3)){
  //     echo '<p>('.$i.') Receptionist Id - '.$data3['recId'].', Receptionist Name - '.$data3['recName'].', Work Store Id - '.$data3['storeId'].'</p>';
  //   }
  }
}
?>
