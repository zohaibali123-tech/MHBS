<?php 
include("db.php");
// session_start();

// $hallid = $_POST['hall_id'];
// $hallname = mysqli_real_escape_string($con,$_POST["hall_name"]);
// $hallcity = mysqli_real_escape_string($con,$_POST["hall_city_name"]);
// $halladdress = mysqli_real_escape_string($con,$_POST["hall_address"]);
// $hallmax = $_POST["hall_max_capicity"];
// $hallfacilities = mysqli_real_escape_string($con,$_POST["hall_facilities"]);
// $hallparking = mysqli_real_escape_string($con,$_POST["hall_parking"]);


// $hallphone = mysqli_real_escape_string($con,$_POST["hall_phone"]);
// $hallemail = $_POST["hall_email"];
// $hallweb =  mysqli_real_escape_string($con,$_POST["hall_web"]);
// $hallface = mysqli_real_escape_string($con,$_POST["hall_face"]);
// $hallinsta = mysqli_real_escape_string($con,$_POST["hall_insta"]);
// $hallyou  = mysqli_real_escape_string($con,$_POST["hall_you"]);

// $hallservice = $_POST["hall_service_charges"];
// $halllight  = $_POST["hall_lighting"];
// $hallDJ = $_POST["hall_DJ"];
// $halltax = $_POST["hall_tax"];
// $hallbook = $_POST["hall_advance_book"];


// $hallbankname  = $_POST["hall_bank_name"];
// $hallbanktitle = $_POST["hall_bank_title"];
// $hallaccno     = $_POST["hall_acc_no"];
// $halliban      = $_POST["hall_iban"];
// $halldesc      = $_POST["hall_desc"];




// $hall_data_sql = "UPDATE `hall_main_info` SET `hall_name`='$hallname',`hall_city_name`='$hallcity',`hall_address`='$halladdress',`hall_max_capicity`=$hallmax,`hall_facilities`='$hallfacilities',`hall_parking`='$hallparking' WHERE hall_id={$hallid};";


// $hall_data_sql .="UPDATE `hall_contact` SET `hall_phone`='$hallphone',`hall_email`='$hallemail',`hall_website`='$hallweb',`hall_face`='$hallface',`hall_insta`='$hallinsta',`hall_you`='$hallyou' WHERE hall_id={$hallid};";

// $hall_data_sql .= "UPDATE `hall_charges` SET `hall_service_charges`='$hallservice',`hall_lighting`='$halllight',`hall_DJ`='$hallDJ',`hall_tax`='$halltax',`hall_advance_book`='$hallbook' WHERE hall_id = {$hallid};";

// $hall_data_sql .= "UPDATE `hall_bank_detail` SET `hall_bank_name`='$hallbankname',`hall_bank_title`='$hallbanktitle',`hall_acc_no`=$hallaccno,`hall_iban`='$halliban',`hall_desc`='$halldesc' WHERE hall_id= {$hallid};";

// if (mysqli_multi_query($con, $hall_data_sql)) {
// header("location:myhall.php");
// } else {
// echo "<div class='alert alert-danger'> Query Failed </div>";
// }

$hallid = $_POST['hall_id'];
$hallname = mysqli_real_escape_string($con, $_POST["hall_name"]);
$hallcity = mysqli_real_escape_string($con, $_POST["hall_city_name"]);
$halladdress = mysqli_real_escape_string($con, $_POST["hall_address"]);
$hallmax = $_POST["hall_max_capicity"];
$hallfacilities = mysqli_real_escape_string($con, $_POST["hall_facilities"]);
$hallparking = mysqli_real_escape_string($con, $_POST["hall_parking"]);
$hallphone = mysqli_real_escape_string($con, $_POST["hall_phone"]);
$hallemail = $_POST["hall_email"];
$hallweb =  mysqli_real_escape_string($con, $_POST["hall_web"]);
$hallface = mysqli_real_escape_string($con, $_POST["hall_face"]);
$hallinsta = mysqli_real_escape_string($con, $_POST["hall_insta"]);
$hallyou  = mysqli_real_escape_string($con, $_POST["hall_you"]);
$hallservice = $_POST["hall_service_charges"];
$halllight  = $_POST["hall_lighting"];
$hallDJ = $_POST["hall_DJ"];
$halltax = $_POST["hall_tax"];
$hallbook = $_POST["hall_advance_book"];
$hallbankname  = $_POST["hall_bank_name"];
$hallbanktitle = $_POST["hall_bank_title"];
$hallaccno     = $_POST["hall_acc_no"];
$halliban      = $_POST["hall_iban"];
$halldesc      = $_POST["hall_desc"];

// Construct the SQL query
// $hall_data_sql = "UPDATE `hall_main_info` SET `hall_name`='$hallname', `hall_city_name`='$hallcity', `hall_address`='$halladdress', `hall_max_capicity`=$hallmax, `hall_facilities`='$hallfacilities', `hall_parking`='$hallparking' WHERE hall_id=$hallid;";
$hallmax = $_POST["hall_max_capicity"];

// Check the value and update the SQL query accordingly
if (strpos($hallmax, ' to ') !== false) {
    // If the value contains 'to', split it into two parts and construct the query
    list($min_capacity, $max_capacity) = explode(' to ', $hallmax);
    $hall_data_sql = "UPDATE `hall_main_info` SET `hall_name`='$hallname', `hall_max_capicity_min`='$min_capacity', `hall_max_capicity`='$max_capacity', `hall_facilities`='$hallfacilities', `hall_parking`='$hallparking' WHERE hall_id=$hallid;";
} else {
    // If it doesn't contain 'to', proceed as usual
    $hall_data_sql = "UPDATE `hall_main_info` SET `hall_name`='$hallname', `hall_max_capicity`='$hallmax', `hall_facilities`='$hallfacilities', `hall_parking`='$hallparking' WHERE hall_id=$hallid;";
}

// Rest of your code...

$hall_data_sql .= "UPDATE `hall_contact` SET `hall_phone`='$hallphone', `hall_email`='$hallemail', `hall_website`='$hallweb', `hall_face`='$hallface', `hall_insta`='$hallinsta', `hall_you`='$hallyou' WHERE hall_id=$hallid;";

$hall_data_sql .= "UPDATE `hall_charges` SET `hall_service_charges`='$hallservice', `hall_lighting`='$halllight', `hall_DJ`='$hallDJ', `hall_tax`='$halltax', `hall_advance_book`='$hallbook' WHERE hall_id=$hallid;";

$hall_data_sql .= "UPDATE `hall_bank_detail` SET `hall_bank_name`='$hallbankname', `hall_bank_title`='$hallbanktitle', `hall_acc_no`=$hallaccno, `hall_iban`='$halliban', `hall_desc`='$halldesc' WHERE hall_id=$hallid;";

// Execute the multi-query
if (mysqli_multi_query($con, $hall_data_sql)) {
    header("location: myhall.php");
} else {
    echo "<div class='alert alert-danger'> Query Failed </div>";
}
?>