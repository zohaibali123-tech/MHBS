<?php 
include("db.php");

$u_id = $_GET['id'];

$sql = "SELECT * From `menu` WHERE menu_id={$u_id}";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
unlink("uploads/".$row['menu_image']);

$query = "DELETE FROM `menu` WHERE menu_id={$u_id}";
mysqli_query($con,$query);

header('location:mymenu.php');


?>