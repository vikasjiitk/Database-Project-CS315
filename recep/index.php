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
  $q = "SELECT * from `Rcpts` where `recUser` = '$user' and `recPass` = '$pass'";
  $link = mysqli_connect('localhost','pma','','chainStores');
  $run = mysqli_query($link, $q);
  $n = mysqli_num_rows($run);
  if($n == 0){
    header("Location:../login.php");
    exit;
  }
}
?>
<title>Receptionst</title>
<head>
  <link rel="stylesheet" type="text/css" href="../style.css">
<style>
</style>
</head>
<body>
   <p>
   <h1>Chain Store Management System</h1>
   <h3></h3>
   </p>
    <ul>
      <li><a class="active" href="index.php">Receptionst</a></li>
      <li><a href="update.php">Update Stock</a></li>
      <li><a href="selling.php">Selling Details</a></li>
      <li style="float:right"><a class="active1" href="../logout.php">Logout</a></li>
    </ul>
    <?php
    $link = mysqli_connect('localhost','pma','','chainStores');
    $user = $_SESSION['loggedin'];
    $query = "SELECT * from `Rcpts` where `recUser` = '$user'";
    $query_run = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($query_run);
    echo '<p><hr> Receptionist Name - '.$data['recName'].'<br/> <hr> Work Store Id - '.$data['storeId'].'</p>'
     ?>
</body>
