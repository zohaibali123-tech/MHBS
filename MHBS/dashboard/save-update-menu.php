<?php 
include("db.php");

if(empty($_FILES['new-image']['name']))
{
    $file_name = $_POST['old_image'];
}
else{
    $error = array();
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    // $file_ext = end(explode('.',$file_name));
    $extensions = array("jpeg", "png", "jpg");

    // if (in_array($file_ext, $extensions) === false) {
    //     $error[] = "This Extension file not Allowed, Please Choose a JPG, JPEG, or PNG File.";
    // }
    if ($file_size > 2097152) {
        $error[] = "File Size must be 2MB or Lower.";
    }
    if (empty($error)==true) {
        move_uploaded_file($file_tmp, "upload/" . $file_name);
    } else {
      print_r($error);
      die();
  }
}
echo $sql = "UPDATE `menu` SET `menu_name`='{$_POST["menu_name"]}',`menu_price`={$_POST["menu_price"]},`menu_items`={$_POST["menu_items"]},`menu_image`='{$file_name}'WHERE `menu_id`={$_POST["id"]}";

$result = mysqli_query($con,$sql);

if($result){
    header("location:mymenu.php");}
else{
    echo "Query Failed";
}
?>
