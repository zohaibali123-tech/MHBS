<?php 
include("db.php");
session_start();
if (isset($_SESSION["userid"])){
    $user = $_SESSION["userid"];
    $hallIDQuery = "SELECT hall_id FROM `hall_main_info` WHERE user_id = $user";

// Execute the query to get the hall_id
$hallIDResult = mysqli_query($con, $hallIDQuery);

if ($hallIDResult) {
    
    $row = mysqli_fetch_assoc($hallIDResult);
    $hallID = $row['hall_id'];
}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Charges</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?php include("sidebar.php"); ?>
    
    <div class="container">
        <div class="row">
            
            <div class="d-flex w-100 my">
                <h3 class="p-2 mt-2">Guest limit</h3>
                <a href="addhallcharges.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Guest Slot</a>    
            </div>
            <div class="col-lg-12 col-md-6 bg-light shadow p-3 ">
    
                <table id="menuTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Guest Slot</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                    $sql = "SELECT hc.price, hc.guest_slot, hc.hall_charges_id  
                        FROM hall_main_info hmi
                        JOIN hallcharges hc ON hmi.hall_id = hc.hall_id
                        WHERE hmi.user_id = $user";

                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['guest_slot'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td>
                        <a href="hallcharges-edit.php?id=<?php echo $row['hall_charges_id']; ?> " class="btn btn-warning text-white ">Edit</a>  
                        <a href="hallcharges-delete.php?id=<?php echo $row['hall_charges_id']; ?>" class="btn btn-danger ">Delete</a>
                        </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

<?php } 
else {
    header("location:../loginform.php");
}?>