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
<title>Update</title>
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
      <li><a href="index.php">Receptionst</a></li>
      <li><a class="active" href="update.php">Update Stock</a></li>
      <li><a href="selling.php">Selling Details</a></li>
      <li style="float:right"><a class="active1" href="../logout.php">Logout</a></li>
    </ul>
     <form action = "" method = "post">
     <input type = "text" name = "itemId" placeholder="Item ID">
     <input type = "text" name = "model" placeholder="Model">
     <button type="submit">Update</button>
   </form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $link = mysqli_connect('localhost','pma','','chainStores');
  $user = $_SESSION['loggedin'];
  $query1 = "SELECT `storeId` from `Rcpts` where `recUser` = '$user'";
  $query_run1 = mysqli_query($link, $query1);
  $store = mysqli_fetch_assoc($query_run1);
  // echo $store['storeId'];
  $Store = $store['storeId'];
  $model = $_POST['model'];
  $item = $_POST['itemId'];
  $query2 = "SELECT * from `Model` where `modelId` = '$model'";
  $query_run2 = mysqli_query($link, $query2);
  $items = mysqli_num_rows($query_run2);
  if($items != 0){
    $query4 = "SELECT * from `Sales` where `itemId` = '$item'";
    $query_run4 = mysqli_query($link, $query4);
    $items4 = mysqli_num_rows($query_run4);
    if($items4 == 0){
      $query3 = "Insert into `Item` values(".$item.",".$Store.",".$model.")";
      if($query_run3 = mysqli_query($link, $query3)){
        echo '<p>Data Inserted Successfully</p>';
      }
      else { echo '<p class="warning">Item already Existed</p>';}
    }else{echo '<p class="warning">Item already Existed</p>'; }}
  else{echo '<p class="warning">Such Model Id does not exist.</p>';}
}
 ?>
</body>
