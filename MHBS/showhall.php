<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <meta charset="UTF-8">
    <title>Hall Booking Calendar</title>
    <style>
        
        /* Basic calendar styles */
.calendar {
    width: 300px;
    margin: 0 auto;
    text-align: center;
}
.calendar a {
  color:black;
}
.calendar a:hover {
  color:red;
  text-decoration: none;
}
.month {
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 5px;
}

.booked {
    background-color: #ffcccc; /* Color for booked dates */
    font-weight: bold;
}
a {
    text-decoration: none;
}

    </style>
</head>
<body>

    <?php
    include("nav.php");
    include("dashboard/db.php");

    $hallId = $_GET["hall_id"];

    $sql = "SELECT hmi.hall_name, hmi.hall_address,hmi.hall_desc, hi.image_path
            FROM hall_main_info hmi 
            INNER JOIN hall_images hi ON hmi.hall_id = hi.hall_id
            WHERE hmi.hall_id = $hallId";

    $image = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($image);
    ?>

    <!-- Hall Name and Address -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5 ">
                <h2>Hall Name: <?php echo $row['hall_name']; ?></h2>
                <p>Hall Address: <?php echo $row['hall_address']; ?></p>
                <p>Desciption : <?php echo $row['hall_desc']; ?></p>
            </div>
        


    <!-- Hall Calendar -->
    <div class="col-lg-4 mt-5 mx-5">
    <div class="calendar">
      <h4>Booking Calendar</h4>
      
    <div class="month">
        <!-- Month and Year navigation -->
        <!-- Previous month -->
        <?php
        // Get the month and year from URL parameters or current date
        $month = isset($_GET['month']) ? $_GET['month'] : date('m');
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        
        $prevMonth = date("m", strtotime("-1 month", strtotime($year . '-' . $month . '-01')));
        $prevYear = date("Y", strtotime("-1 month", strtotime($year . '-' . $month . '-01')));
        
        $nextMonth = date("m", strtotime("+1 month", strtotime($year . '-' . $month . '-01')));
        $nextYear = date("Y", strtotime("+1 month", strtotime($year . '-' . $month . '-01')));
        ?>
        
        <a href="?month=<?php echo $prevMonth ?>&year=<?php echo $prevYear ?>">Previous</a>
        <span><?php echo date("F Y", strtotime($year . '-' . $month . '-01')) ?></span>
        <a href="?month=<?php echo $nextMonth ?>&year=<?php echo $nextYear ?>">Next</a>
    </div>

    <table>
        <tr>
            <!-- Display the days of the week -->
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>
            <?php
            // Loop through each day of the month to create the calendar
            $firstDayOfMonth = strtotime($year . '-' . $month . '-01');
            $totalDays = date('t', $firstDayOfMonth);
            $dayOfWeek = date('w', $firstDayOfMonth);
            
            // Add empty cells before the first day of the month
            for ($i = 0; $i < $dayOfWeek; $i++) {
                echo '<td></td>';
            }
            
            // Display days with links
            for ($day = 1; $day <= $totalDays; $day++) {
                echo '<td>';
                echo '<a  class="card-link" href="booking_details.php?hall_id=' . $hallId . '&date=' . $year . '-' . $month . '-' . sprintf('%02d', $day) . '">' . $day . '</a>';
                echo '</td>';
                
                if (++$dayOfWeek > 6) {
                    echo '</tr>';
                    if ($day < $totalDays) {
                        echo '<tr>';
                    }
                    $dayOfWeek = 0;
                }
            }
            
            // Add empty cells after the last day of the month
            while ($dayOfWeek > 0 && $dayOfWeek < 7) {
                echo '<td></td>';
                $dayOfWeek++;
            }
            ?>
        </tr>
    </table>
</div>
</div>
</div>
    </div>


    <!-- Hall Image Slider -->
    <div id="imageSlider" class="carousel slide" data-ride="carousel">
        <!-- Slider content -->
    </div>
    <!-- Filter for Hall Availability -->
    <div class="container mt-5">
        <h3>Check Hall Availability</h3>
        <form action="availability_check.php" method="GET">
            <!-- Add form elements for availability filtering -->
            <div class="form-group">
                <label for="datePicker">Select Date:</label>
                <input type="date" class="form-control" id="datePicker" name="selectedDate">
            </div>
            <div class="form-group">
                <label for="guestCount">Number of Guests:</label>
                <input type="number" class="form-control" id="guestCount" name="guestCount">
            </div>
            <!-- Add more form elements for filtering -->
            <button type="submit" class="btn btn-primary">Check Availability</button>
        </form>
    </div>

    <?php include("footer.php"); ?>

    <!-- Bootstrap JS and jQuery -->
    <!-- Scripts and JS libraries -->
</body>
</html>
