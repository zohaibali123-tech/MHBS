<?php 
include("db.php");
$sql = "UPDATE `hallcharges` SET `guest_slot`='{$_POST["guest_slot"]}',`price`={$_POST["price"]} WHERE `hall_charges_id`={$_POST["id"]}";
$result = mysqli_query($con,$sql);

if($result){
    header("location:hallcharges.php");
exit;}
else{
    echo "Query Failed";
}
?>
