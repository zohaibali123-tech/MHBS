<?php 
session_start();
$user = $_SESSION['userid'];
if(isset($_SESSION['userid'])){
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
            color :;
        }
    </style><!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    
    <?php  include("sidebar.php"); ?>
    
  <div class="container">
  <div class="row">
    
      <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-5">
          <h5>My Halls/Venues</h5>
          
            <table id="menuTable" class="table table-striped table-hover">
            <thead>
            <tr>
                
                  <td>S#</td>
                  <td>Hall Name </td>
                  <td>Hall Address </td>
                  <td>Contact Number </td>
                  <td>Email</td>
                  
              </tr>
              </thead>  
              <?php
                        $no = 0;
                        
                        $sql = "SELECT hmi.hall_name, hmi.hall_address, hmi.hall_max_capicity , hc.hall_advance_book , hct.hall_phone, hct.hall_email
                        FROM hall_main_info hmi 
                        INNER JOIN hall_charges hc
                        ON hmi.hall_id = hc.hall_id
                        INNER JOIN hall_contact hct
                        ON hmi.hall_id = hct.hall_id
                        WHERE hmi.user_id = {$user}";
                    


            $query = mysqli_query($con, $sql);
            $records = mysqli_num_rows($query); // Count the records if needed

// Use the same $query variable to fetch data for the table display
            while ($row = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['hall_name'];?></td>
                                <td><?php echo $row['hall_address'];?></td>
                                <td><?php echo $row['hall_phone'];?></td>
                                <td><?php echo $row['hall_email'];?></td>
                                

                            </tr>
                        <?php }  ?>
                    </tbody>
             
              <tbody>
          </tbody>  
              </table>
              
             
      </div>
      </div>
      </div>
      <div class="container">
          <div class="row">
          <div><h3 class="my-5">Welcome! 
            <span> <?php 
                echo getUsernameByID($user);
            ?> 
            </span>
            </h3>
        </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="row g-5">
            <div class="col-lg-4 col-md-6 btn btn-success ">
                <div class="p-3 ">
                <i class="bi bi-building"></i> My Hall
                <h2 class="">
                    <?php 
                    $sql ="SELECT * FROM `hall_main_info` WHERE user_id = {$user}";
                    $query = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($query);
                            if ($records > 0) {
                                echo $records;
                            }
                            else{
                                echo 0;
                            }
                     ?>
                </h2>
                </div>
              </div>

              <div class="col-lg-1 col-md-6 ">
                <!-- Extra Columns used to Space -->
              </div>
            

              <div class="col-lg-4 col-md-6 btn btn-primary ">
                <div class="p-3">
                <i class="bi bi-calendar"></i> My Booking
                <h2 class="">
                <?php 
                    $sql ="SELECT * FROM `hall_booking_records` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = $user)";
                    $query = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($query);
                            if ($records > 0) {
                                echo $records;
                            }
                            else{
                                echo 0;
                            }
                     ?>
                </h2>
                </div>
              </div>
            </div>
          </div>

          <div class="container my-5 instructions">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h5>Instructions:</h5>
                    <p>Adding Hall Online please add the following:</p>
                    <ul>
                        <li>Hall Menu with picture</li>
                        <li>Additional Menu</li>
                        <li>Hall Charges</li>
                        <li>Stage Decoration</li>
                        <li>Photo/Video Serices</li>
                    </ul>
                </div>
            </div>
          </div>

    <?php include("dbfooter.php"); ?>
    <!-- Bootstrap and DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#menuTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search..."
                }
            });
        });
    </script>
</body>
</html>

<?php } else {
    header("location:../loginform.php");
    }?>