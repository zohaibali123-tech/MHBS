<?php 
include("db.php");
session_start();
$user = $_SESSION['userid'];

        
//         $targetDir = "uploads/"; // Directory to store uploaded images
//         $allowTypes = array('jpg','png','jpeg','gif'); // Allowed file types
        
//         // Loop through each file and process upload
//         foreach ($_FILES['image']['name'] as $key=>$val) {
//             $fileName = basename($_FILES['image']['name'][$key]);
//             $targetFilePath = $targetDir . $fileName;
//             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            
//             if (in_array($fileType, $allowTypes)) {
//                 // Upload file to server
//                 if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFilePath)) {
//                     // Insert file details into database
//                     $insert = "INSERT INTO hall_images (user_id, image_path) VALUES ('$user', '$targetFilePath')";
//                     mysqli_query($con, $insert); // Execute the query (assuming $con is your database connection)
//                 }}}

                
//                 $imagePath = $_FILES['cardimage']['name'];
//                 $targetDir2 = "uploads/"; // Directory where you want to save uploaded images
//                 $targetPath = $targetDir2 . basename($imagePath);
            
//                 if (move_uploaded_file($_FILES["cardimage"]["tmp_name"], $targetPath)) {
//                     $insertQuery = "INSERT INTO hall_card_image (user_id, image_path) VALUES ('$user', '$targetPath')";
//                     $result = mysqli_query($con, $insertQuery);
//                 } else {
//                     echo "Error uploading image.";
//                 }

                
                $hallname = mysqli_real_escape_string($con,$_POST["hall_name"]);
                $hallcity = mysqli_real_escape_string($con,$_POST["hall_city_name"]);
                $halladdress = mysqli_real_escape_string($con,$_POST["hall_address"]);
                $hallmax = $_POST["hall_max_capicity"];
                $hallfacilities = mysqli_real_escape_string($con,$_POST["hall_facilities"]);
                $hallparking = mysqli_real_escape_string($con,$_POST["hall_parking"]);
                $halldesc = mysqli_real_escape_string($con,$_POST["hall_desc"]);
                
                
                $hallphone = mysqli_real_escape_string($con,$_POST["hall_phone"]);
                $hallemail = $_POST["hall_email"];
                $hallweb =  mysqli_real_escape_string($con,$_POST["hall_web"]);
                $hallface = mysqli_real_escape_string($con,$_POST["hall_face"]);
                $hallinsta = mysqli_real_escape_string($con,$_POST["hall_insta"]);
                $hallyou  = mysqli_real_escape_string($con,$_POST["hall_you"]);
                
                $hallservice = $_POST["hall_service_charges"];
                $halllight  = $_POST["hall_lighting"];
                $hallDJ = $_POST["hall_DJ"];
                $halltax = $_POST["hall_tax"];
                $hallbook = $_POST["hall_advance_book"];
                
                
                $hallbankname  = $_POST["hall_bank_name"];
                $hallbanktitle = $_POST["hall_bank_title"];
                $hallaccno     = $_POST["hall_acc_no"];
                $halliban      = $_POST["hall_iban"];
                
                


// // $hall_data_sql ="INSERT INTO `hall_main_info`(`hall_id`, `user_id`, `hall_name`, `hall_city_name`, `hall_address`, `hall_max_capicity`, `hall_facilities`, `hall_parking`,`hall_desc`)
// //  VALUES ('',$user,'$hallname','$hallcity','$halladdress',$hallmax,'$hallfacilities','$hallparking','$halldesc');";

// // $hall_data_sql.="INSERT INTO `hall_contact`(`hall_contact_id`, `user_id`, `hall_phone`, `hall_email`, `hall_website`, `hall_face`, `hall_insta`, `hall_you`)
// // VALUES ('',$user,'$hallphone','$hallemail','$hallweb','$hallface','$hallinsta','$hallyou');";
// // $hall_id = 

// // $hall_data_sql.="INSERT INTO `hall_charges`(`hall_charges_id`, `user_id`, `hall_service_charges`, `hall_lighting`, `hall_DJ`, `hall_tax`, `hall_advance_book`)
// // VALUES ('',$user,$hallservice,$halllight,$hallDJ,$halltax,$hallbook);";

// // $hall_data_sql.="INSERT INTO `hall_bank_detail`(`hall_bank_id`, `user_id`, `hall_bank_name`, `hall_bank_title`, `hall_acc_no`, `hall_iban`) 
// // VALUES ('','$user','$hallbankname','$hallbanktitle','$hallaccno','$halliban');";



// $hall_data_sql = "INSERT INTO `hall_main_info` (`user_id`, `hall_name`, `hall_city_name`, `hall_address`, `hall_max_capicity`, `hall_facilities`, `hall_parking`, `hall_desc`)
// VALUES ('$user', '$hallname', '$hallcity', '$halladdress', $hallmax, '$hallfacilities', '$hallparking', '$halldesc');";

// $hall_data_sql .= "INSERT INTO `hall_contact` (`user_id`, `hall_phone`, `hall_email`, `hall_website`, `hall_face`, `hall_insta`, `hall_you`)
// VALUES ('$user', '$hallphone', '$hallemail', '$hallweb', '$hallface', '$hallinsta', '$hallyou');";

// $hall_data_sql .= "INSERT INTO `hall_charges` (`user_id`, `hall_service_charges`, `hall_lighting`, `hall_DJ`, `hall_tax`, `hall_advance_book`)
// VALUES ('$user', $hallservice, $halllight, $hallDJ, $halltax, $hallbook);";

// $hall_data_sql .= "INSERT INTO `hall_bank_detail` (`user_id`, `hall_bank_name`, `hall_bank_title`, `hall_acc_no`, `hall_iban`)
// VALUES ('$user', '$hallbankname', '$hallbanktitle', '$hallaccno', '$halliban');";

// // echo $hall_data_sql;
// // die();

// if (mysqli_multi_query($con, $hall_data_sql)) {
//     // Retrieve the auto-generated hall_id after the insertion
//     $last_insert_id = mysqli_insert_id($con);
//     header("location: myhall.php?id=$last_insert_id"); // Redirect to the page with the newly created hall_id
// } else {
//     echo "<div class='alert alert-danger'>Query Failed</div>";
// }


// // echo $hall_data_sql;
// // die();

// // if (mysqli_multi_query($con, $hall_data_sql)) {
// // header("location:myhall.php");
// // } else {
// // echo "<div class='alert alert-danger'> Query Failed </div>";
// // }

    


// Your previous code to upload images...

// Perform insertion for `hall_main_info` and retrieve the `hall_id`
$insertMainInfo = "INSERT INTO `hall_main_info` (`user_id`, `hall_name`, `hall_city_name`, `hall_address`, `hall_max_capicity`, `hall_facilities`, `hall_parking`, `hall_desc`)
VALUES ('$user', '$hallname', '$hallcity', '$halladdress', $hallmax, '$hallfacilities', '$hallparking', '$halldesc')";


if (mysqli_query($con, $insertMainInfo)) {
    $lastHallId = mysqli_insert_id($con); // Retrieve the newly inserted hall_id
    // Continue insertion queries using $lastHallId as hall_id for related tables
    $insertContact = "INSERT INTO `hall_contact` (`hall_id`, `hall_phone`, `hall_email`, `hall_website`, `hall_face`, `hall_insta`, `hall_you`)
    VALUES ('$lastHallId', '$hallphone', '$hallemail', '$hallweb', '$hallface', '$hallinsta', '$hallyou')";

    

    $insertCharges = "INSERT INTO `hall_charges` (`hall_id`, `hall_service_charges`, `hall_lighting`, `hall_DJ`, `hall_tax`, `hall_advance_book`)
    VALUES ('$lastHallId', $hallservice, $halllight, $hallDJ, $halltax, $hallbook)";

    $insertBankDetail = "INSERT INTO `hall_bank_detail` (`hall_id`, `hall_bank_name`, `hall_bank_title`, `hall_acc_no`, `hall_iban`)
    VALUES ('$lastHallId', '$hallbankname', '$hallbanktitle', '$hallaccno', '$halliban')";

    // Execute the queries
    mysqli_query($con, $insertContact);
    mysqli_query($con, $insertCharges);
    mysqli_query($con, $insertBankDetail);

    
        $targetDir = "uploads/"; // Directory to store uploaded images
        $allowTypes = array('jpg','png','jpeg','gif'); // Allowed file types
    // Insert images related to the hall_id
    foreach ($_FILES['image']['name'] as $key => $val) {
        $fileName = basename($_FILES['image']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFilePath)) {
                // Insert file details into database with hall_id
                $insert = "INSERT INTO hall_images (hall_id, image_path) VALUES ('$lastHallId', '$targetFilePath')";
                mysqli_query($con, $insert);
            }
        }
    }

    // Insert card image related to the hall_id
    $cardImageName = $_FILES['cardimage']['name'];
    $targetCardPath = $targetDir2 . basename($cardImageName);

    if (move_uploaded_file($_FILES["cardimage"]["tmp_name"], $targetCardPath)) {
        $insertQuery = "INSERT INTO hall_card_image (hall_id, image_path) VALUES ('$lastHallId', '$targetCardPath')";
        $result = mysqli_query($con, $insertQuery);
    } else {
        echo "Error uploading image.";
    }



    header("location: myhall.php?id=$lastHallId"); // Redirect to the page with the newly created hall_id
} else {
    echo "<div class='alert alert-danger'>Query Failed</div>";
}



  ?>