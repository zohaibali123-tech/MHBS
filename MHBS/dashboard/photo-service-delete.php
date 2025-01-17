<?php 
include("db.php");

$u_id = $_GET['id'];

$query = "DELETE FROM `photoservice` WHERE photo_service_id={$u_id}";
mysqli_query($con,$query);

header('location:photo-service.php');



?>