<?php 
include("db.php");
$sql = "UPDATE `photoservice` SET `package_name`='{$_POST["package_name"]}',`service`='{$_POST["service"]}',`photo_service_price`={$_POST["photo_service_price"]} WHERE `photo_service_id`={$_POST["id"]}";
$result = mysqli_query($con,$sql);

if($result){
    header("location:photo-service.php");
exit;}
else{
    echo "Query Failed";
}
?>
