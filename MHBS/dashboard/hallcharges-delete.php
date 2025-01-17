<?php 
include("db.php");

$u_id = $_GET['id'];

$query = "DELETE FROM `hallcharges` WHERE hall_charges_id={$u_id}";
mysqli_query($con,$query);

header('location:hallcharges.php');
?>