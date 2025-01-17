<?php
include("dashboard/db.php"); // Adjust this to include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$guest = $_POST['guests'];
$hallId = $_POST['hall_id'];
$bookingDate = $_POST['booking_date'];

// Prepared statement to insert data into the hall_booking_records table
$insert = "INSERT INTO hall_booking_records (hall_id, event_name, full_name, email, contact_no, guests, booking_date)
           VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $insert);
if ($stmt) {
    // Bind parameters to the prepared statement as strings
    mysqli_stmt_bind_param($stmt, "isssiss", $hallId, $eventName, $fullName, $email, $contact, $guest, $bookingDate);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Check if the insertion was successful
    $inserted = mysqli_stmt_affected_rows($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($inserted > 0) {
        // Booking details successfully inserted
        header("Location:index.php"); // Redirect to confirmation page
        exit();
    } else {
        // Handle errors or display a failure message
    }
} else {
    // Handle the case where the prepared statement failed
    echo "Error in the prepared statement: " . mysqli_error($con);
}
}
?>
