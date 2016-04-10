<!DOCTYPE html>
<?php session_start();
if(!$_SESSION['loggedin'])
{
header("Location:../login.php");
exit;
}
?>
<title>Store Details</title>
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
      <li><a class="active" href="store.php">Store</a></li>
      <li><a href="owner.php">Owner</a></li>
      <li><a href="profit.php">Profit</a></li>
      <li><a href="model.php">Model</a></li>
      <li style="float:right"><a class="active1" href="../logout.php">Logout</a></li>
   </ul>
   <ul class = "vertical">
    <li class = "vertical"><a href="addstore.php">Add Store</a></li>
    <li class = "vertical"><a class = "active3" href="deletestore.php">Delete Store</a></li>
    <li class = "vertical"><a href="storedetails.php">Store Details</a></li>
    <li class = "vertical"><a href="displaystores.php">Display Stores</a></li>
  </ul>
   <h3>Delete a Store</h3>
     <form action = "" method = "post">
     <input type = "text" name = "storeId" placeholder="Store ID">
     <button type="submit">DELETE</button>
     </form>
</body>