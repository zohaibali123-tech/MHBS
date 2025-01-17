<?php
include("db.php"); 

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$city = $_POST['city'];


$update = "UPDATE `users` SET `firstname`='{$firstname}',`lastname`='{$lastname}',
`email`='{$email}',`city`='{$city}' WHERE `id`={$id}";
$record = mysqli_query($con, $update) or die ("Query Failed !");
header("location:report.php");

mysqli_close($con);
?>