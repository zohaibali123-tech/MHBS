<?php include("links.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best Wedding Venue</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Example</title>
  <!-- Bootstrap CSS via CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome (for icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Your Custom CSS -->
  <style>
     /* Custom styles */
     .custom-card {
       transition: box-shadow 0.3s; /* Smooth transition for the shadow */
     }
 
     .custom-card:hover {
       box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Shadow effect on hover */
       transform: translate(-0px,-5px);
       text-decoration: none;
       
     }
     .card-body{
      position: relative; /* Ensures relative positioning */

     }
     .card-body p{
      font-weight: 500;
     }
     .card-img {
      width: 100%;
      height: 100%;
     }

     /* Reduce space between rows */
     @media (min-width:670px) {
        .reduce-gutter > .col-md-12 {
          margin-bottom: -75px; /* Adjust as needed */
        }
 
     /* .reduce-gutter > .col-md-12 {
       margin-bottom: -75px; /* Adjust as needed */
     }
     hr {
        border: 0; /* Remove default border */
        border-top: 2px solid rgb(149, 132, 132); /* Set the thickness and color of the horizontal rule */
      }
      a{
        text-decoration: none;
      }
  </style>
</head>
<body>

<?php include("nav.php"); 
  // $user = $_SESSION["userid"];
?>
<div class="fluid-container mx-5 my-1">
    <div class="row ">
        <div class="col-md-6 col-lg-12"><h1>Wedding Halls And Marquees In Pakistan</h1></div>
        <div class="col-md-6 col-lg-12">
            <p>
            Book the best wedding venues and marquees, in Mirpurkhas, Hyderabad, and Karachi and the best wedding halls  to host your wedding outside under the stars or in a gorgeous hall, with <b>Our Website</b>. Glance at their menus, halls, charges, and much more. 
        </p>
    </div>
    </div>
</div>


<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <!-- Filter options (example) -->
          <h5 class="card-title mb-3">Filter</h5>
          <div class="form-group">
            <label for="citySelect">Select City:</label>
            <select class="form-control" id="citySelect">
              <option>All Cities</option>
              <option>Mirpurkhas</option>
              <option>Hyderabad</option>
              <option>Karachi</option>
              <!-- Add more cities as needed -->
            </select>
          </div>
          <div class="form-group">
            <label for="capacityInput">Number of Guests</label>
            <input type="number" class="form-control" id="capacityInput" placeholder="Enter Number of Guests">
          </div>
          
          <div class="form-group">
            <label for="capacityInput">Price:</label>
            <input type="number" class="form-control" id="capacityInput" placeholder="Enter Price">
          </div>
          <!-- Add more filter options here -->

          <!-- Apply filter button -->
          <button class="btn btn-primary mt-3">Apply Filters</button>
        </div>
      </div>
    </div>
    
    <!-- ***********************************Venue Listings******************************************** -->
    <div class="col-md-9 mt-0">
      <!-- HALL CARD START -->
      <div class="col-md-12">
              <?php 
              $imgquery = "SELECT hmi.hall_id,hmi.hall_name,hci.image_path, hmi.hall_address, hmi.hall_max_capicity,hmi.hall_desc, hc.price, hct.hall_phone, hct.hall_email 
              FROM hall_main_info hmi 
              INNER JOIN hallcharges hc ON hmi.hall_id = hc.hall_id 
              INNER JOIN hall_contact hct ON hmi.hall_id = hct.hall_id 
              INNER JOIN hall_card_image hci ON hmi.hall_id = hci.hall_id";
          
          $result = mysqli_query($con, $imgquery);
          
          if ($result) {
            // Fetch data from the result set and process it
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="row reduce-gutter">
              <a href="showhall.php?hall_id=<?php echo $row['hall_id'];?>" class="card custom-card h-75">
                  <div class="row no-gutters">
                    <!-- Image Column -->
                    <div class="col-md-6">
                      
                      <img src="dashboard/<?php echo $row['image_path']; ?>" class="card-img  " alt="Hall Image">
                      
                        
                        
                    </div>
                    <!-- Details Column -->
                    <div class="col-md-6">
                      <div class="card-body">
                        <h1 class="card-title "><?php echo $row['hall_name']; ?></h1>
                        <p><i class="fas fa-map-marker-alt"></i> Address <?php echo $row['hall_address']; ?></p>
                        <p>Capacity: <?php echo $row['hall_max_capicity']; ?> people</p>
                        <p>Available: Yes</p>
                        <p>Desciption: <?php echo $row['hall_desc']; ?></p>
                        <hr >
                        <p class="float-right h5">Starting Price: <?php echo $row['price']; ?></p>
                        
                        <!-- Other hall details -->
                      </div>
                    </div>
                  </div>
              </a>
            </div>


      </div>
    </div>
    </div>
    </div>
      
            <?php } }?>
            

<?php include("footer.php"); ?>
<!-- 
Bootstrap JS and jQuery
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
