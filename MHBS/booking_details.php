<?php 
    include("dashboard/db.php");
    $bookingDate = $_GET['date'];
    $hallId = $_GET ['hall_id'];
    $sql = mysqli_query($con,
    "SELECT hmi.hall_name , hmi.hall_address, hc.hall_phone 
    From hall_main_info hmi
    INNER JOIN hall_contact hc
    WHERE hmi.hall_id = $hallId");

    $row = mysqli_fetch_array($sql);
    $hallName = $row["hall_name"];
    $contact = $row["hall_phone"];
    $hallAd = $row["hall_address"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        /* For demonstration purposes, I'm including a simple background color */
        body {
            background-color: #f4f4f4;
        }

        .booking-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>
    <div class="container">
        <h1 class="mt-4 mb-4">Booking Details</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="booking-card">
                    <h3>Event Details</h3>
                    <!-- <p><strong>Event Name:</strong> <input type="text" name="event_name" class="form-control"></p> -->
                    <p><strong>Date: </strong> <?php echo $bookingDate;?></p>
                    <p><strong>Venue: </strong><?php echo $hallName;?> </p>
                    <p><strong>Address: </strong><?php echo $hallAd;?> </p>
                    <p><strong>Contact: </strong> <?php echo $contact;?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="booking-card">
                    <h3>Guest Information</h3>
                    <form method="POST" action="process_booking.php">
                    <div class="form-group">
                            <label for="fullName">Event Name:</label>
                            <input type="text" class="form-control" name="eventName" placeholder="Enter your Event name" required>
                        </div>
                        <div class="form-group">
                            <label for="fullName">Full Name:</label>
                            <input type="text" class="form-control" name="fullName" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Contact No:</label>
                            <input type="type" class="form-control" name="contact" placeholder="Enter your Contact No" required>
                        </div>
                        <div class="form-group">
                            <label for="guests">Number of Guests:</label>
                            <input type="number" class="form-control" name="guests" placeholder="Enter number of guests" required>
                        </div>
                        <input type="hidden" name="booking_date" value=<?php echo $bookingDate ;?> id="">
                        <input type="hidden" name="hall_id" value=<?php echo $hallId ;?> id="">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
