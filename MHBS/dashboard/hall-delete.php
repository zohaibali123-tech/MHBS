<?php 
include("db.php");

$u_id = $_GET['id'];



$sql = "SELECT * From `hall_images` WHERE hall_id={$u_id}";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result)) {
    unlink("uploads/".$row['image_path']);}

$query = "DELETE FROM hall_main_info WHERE user_id = {$u_id};";
$query.= "DELETE FROM hall_charges WHERE user_id = {$u_id};";
$query.= "DELETE FROM hall_contact WHERE user_id = {$u_id};";
$query.= "DELETE FROM hall_bank_detail WHERE user_id = {$u_id};";
$query.= "DELETE FROM hall_images WHERE user_id = {$u_id};";


mysqli_multi_query($con,$query);

header('location:myhall.php');


?>