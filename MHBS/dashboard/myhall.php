<?php 
include("db.php");
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
  <div class="d-flex w-100 my">
        <h3 class="p-2 mt-2">My Hall</h3>
        <a href="addhallform.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Hall</a>    
    </div>

      <div class="col-lg-12 col-md-12 bg-light shadow  mt-2">
      <h3>Main Information</h3>
            <table id="menuTable" class="table table-striped table-hover">
            <thead>    
            <tr>
                <td>S#</td>
                <td>Hall Name </td>
                <td>Hall Address </td>
                <td>Hall Capicity Max</td>
                <td>Parking Space</td>
                <td>Hall Description</td>
                <td>Operation</td>
                
            </tr>
              </thead>
             <?php
                        $no = 0;
                        // $sql ="SELECT * FROM `hall_main_info` WHERE user_id=$user";
                        $query = mysqli_query($con, "SELECT * FROM `hall_main_info` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                        // $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['hall_name'];?></td>
                                <td><?php echo $row['hall_address'];?></td>
                                
                                <td><?php echo $row['hall_max_capicity'];?></td>
                                <td><?php echo $row['hall_parking'];?></td>
                                <td><?php echo $row['hall_desc'];?></td>
                                <td>
                                    <a href="hall-edit.php?id=<?php echo $row["hall_id"]; ?> "  class="btn btn-warning text-white w-25 ">Edit</a>  
                                    <a href="hall-delete.php?id=<?php echo $row["hall_id"]; ?>" class="btn btn-danger w-25 mx-2">Delete</a>
                                </td>

                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
      <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
        <h3>Contact Details</h3>
          <table id="contactTable" class="table table-striped table-hover">
          <thead>
            <tr>
                <td>S#</td>
                <td>Hall Phone No </td>
                <td>Hall Email Address </td>
                <td>Hall Webiste</td>
                <td>Hall Facebook</td>
                <td>Hall Instagram</td>
                <td>Hall Youtube</td>
                
            </tr>
            </thead>
           <?php
                      $no = 0;
                    //   $sql ="SELECT * FROM `hall_contact` WHERE hall_id= $hallID";
                      $query2 = mysqli_query($con, "SELECT * FROM `hall_contact` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                    //   $query = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_array($query2)) {
                          
                          $no++;
                      ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['hall_phone'];?></td>
                              <td><?php echo $row['hall_email'];?></td>
                              <td><?php echo $row['hall_website'];?></td>
                              <td><?php echo $row['hall_face'];?></td>
                              <td><?php echo $row['hall_insta'];?></td>
                              <td><?php echo $row['hall_you'];?></td>
                              
                          </tr>
                      <?php }  ?>
                  </tbody>
              </table>
            </div>
            <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
        <h3>Charges</h3>
          <table id="chargesTable" class="table table-striped table-hover">
          <thead>
            <tr>
                <td>S#</td>
                <td>Hall Service Charges</td>
                <td>Hall Lighting</td>
                <td>Hall DJ</td>
                <td>Hall Tax</td>
                <td>Hall Advance Payment</td>
                
            </tr>
            </thead>
           <?php
                      $no = 0;
                      $query3 = mysqli_query($con, "SELECT * FROM `hall_charges` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                    //   $sql ="SELECT * FROM `hall_charges` WHERE hall_id=$hallID";
                    //   $query = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_array($query3)) {
                          
                          $no++;
                      ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['hall_service_charges'];?></td>
                              <td><?php echo $row['hall_lighting'];?></td>
                              <td><?php echo $row['hall_DJ'];?></td>
                              <td><?php echo $row['hall_tax'];?></td>
                              <td><?php echo $row['hall_advance_book'];?></td>
                         </tr>
                      <?php }  ?>
                  </tbody>
              </table>
            </div>
            <div class="col-lg-12 col-md-6 bg-light shadow  p-3 mt-2">
        <h3>Bank Details</h3>
          <table id="chargesTable" class="table table-striped table-hover">
          <thead>
            <tr>
                <td>S#</td>
                <td>Hall Bank Name</td>
                <td>Hall Account Title</td>
                <td>Hall Account No</td>
                <td>Hall Account IBAN</td>
                
                
            </tr>
            </thead>
           <?php
                      $no = 0;
                    //   $sql ="SELECT * FROM `hall_bank_detail` WHERE hall_id=$hallID";
                      $query4 = mysqli_query($con, "SELECT * FROM `hall_bank_detail` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                    //   $query = mysqli_query($con, $sql);
                      while ($row = mysqli_fetch_array($query4)) {   
                          
                          $no++;
                      ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['hall_bank_name'];?></td>
                              <td><?php echo $row['hall_bank_title'];?></td>
                              <td><?php echo $row['hall_acc_no'];?></td>
                              <td><?php echo $row['hall_iban'];?></td>
                              
                         </tr>
                      <?php }  ?>
                  </tbody>
              </table>
            </div>  
              
            <div class="mt-5 mb-5 w-100 d-flex justify-content-center px-2  ">
                       
            </div>
      </div>
      </div>
      </div>


      
      <script>
          $(document).ready(function () {
              $('#menuTable').DataTable({
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                  "language": {
                      "search": "_INPUT_",
                      "searchPlaceholder": "Search..."
                    }
                });
                $('#contactTable').DataTable({
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                  "language": {
                      "search": "_INPUT_",
                      "searchPlaceholder": "Search..."
                    }
                });
                $('#chargesTable').DataTable({
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                  "language": {
                      "search": "_INPUT_",
                      "searchPlaceholder": "Search..."
                    }
                });
            });
            </script>
               <!-- Bootstrap and DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    
</body>
</html>

<?php } 
else {
    header("location:../loginform.php");
}?>