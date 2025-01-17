<?php 
session_start();
if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION["userid"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .tab-content {
            padding-left:100px;
            padding-top:10px;
            
        }
        span {
            color:red;
        }
        .instructions{
            color :lightgray;
        }
    </style>
    <!-- Bootstrap CSS -->
  <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <?php  include("sidebar.php"); ?>
    
  <div class="container">
  <div class="row">
    
      <div class="d-flex w-100 my">
                <h3 class="p-2 mt-2">My Booking</h3>
                <a href="addmenu.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Booking</a>    
      </div>
      <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
          <h5>My Menu</h5>
          
          <table class="table">
              <tr>
                  <td>Hall Id</td>
                  <td>Hall Name </td>
                  <td>Event Name </td>
                  <td>Customer Name</td>
                  <td>Email</td>
                  <td>Contact</td>
                  <td>Guests</td>
                  <td>Date</td>
                  <td>Operation</td>
              </tr></thead>
             <?php
                        $no = 0;
                        // $sql ="SELECT * FROM `hall_main_info` WHERE user_id=$user";
                        $query = mysqli_query($con, "SELECT hmi.hall_id,hbr.event_name, hbr.full_name,hbr.email, hbr.email,hbr.contact_no,hbr.guests, hbr.booking_date,hmi.hall_name               FROM `hall_booking_records` hbr
                        INNER JOIN `hall_main_info` hmi
                        WHERE hmi.hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                        // $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['hall_name'];?></td>
                                
                                <td><?php echo $row['event_name'];?></td>
                                <td><?php echo $row['full_name'];?></td>   
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['contact_no'];?></td>
                                <td><?php echo $row['guests'];?></td>     
                                <td><?php echo $row['booking_date'];?></td>
                                
                                <td>
                                    <a href="hall-edit.php?id=<?php echo $row["hall_id"]; ?> "  class="btn btn-warning text-white w-25 ">Edit</a>  
                                    <a href="hall-delete.php?id=<?php echo $row["hall_id"]; ?>" class="btn btn-danger w-25 mx-2">Delete</a>
                                </td>

                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>

           
      </div>
      </div>
      </div>


</body>
</html> 

<?php }
else {
    header("location:../loginform.php");
}?>