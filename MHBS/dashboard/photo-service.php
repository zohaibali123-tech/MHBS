<?php 
session_start();
if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION['userid'];
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
                <h3 class="p-2 mt-2">Photo Video Service</h3>
                <a href="addphotoservice.php" class="btn btn-primary mt-3 ms-auto p-2 mb-2">Add Package</a>    
            </div>
            <div class="col-lg-12 col-md-6 bg-light shadow p-3 ">
    
                <table id="menuTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Package Name</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($con, "SELECT * FROM `photoservice` WHERE hall_id IN (SELECT hall_id FROM hall_main_info WHERE user_id = '$user_id')");
                        while ($row = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['package_name'];?></td>
                                <td><?php echo $row['service'];?></td>
                                <td><?php echo $row['photo_service_price'];?></td>

                        <td>
                        <a href="photo-service-edit.php?id=<?php echo $row['photo_service_id']; ?> " class="btn btn-warning text-white ">Edit</a>  
                        <a href="photo-service-delete.php?id=<?php echo $row['photo_service_id']; ?>" class="btn btn-danger ">Delete</a>
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