<?php
session_start();
include("dashboard/db.php"); // Include your database connection

if (isset($_SESSION["userid"])) {
    if (isset($_POST["submit"])) {
        $userId = $_SESSION["userid"];
        
        $targetDir = "uploads/"; // Directory to store uploaded images
        $allowTypes = array('jpg','png','jpeg','gif'); // Allowed file types
        
        // Loop through each file and process upload
        foreach ($_FILES['image']['name'] as $key=>$val) {
            $fileName = basename($_FILES['image']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFilePath)) {
                    // Insert file details into database
                    $insert = "INSERT INTO hall_images (user_id, image_path) VALUES ('$userId', '$targetFilePath')";
                    mysqli_query($con, $insert); // Execute the query (assuming $con is your database connection)
                }
            }
        }
        header("Location:index.php"); // Redirect after successful upload
    }
} else {
    header("Location: loginform.php"); // Redirect if user is not logged in
}
?>
