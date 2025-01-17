<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php
 include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    
    
<?php include("nav.php");?>

<div class="container my-5 ">
    <h1 class="text-center p-1"> Register User</h1>
    <table class="table table-hover  table-striped text-center">
  <thead class="table-active ">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
      

    </tr>
  </thead>
  <tbody>
    <?php

    $limit = 3;
     
    if(isset($_GET['page']))
      { 
          $page = $_GET['page'];
      }
    else{ $page=1; }

    //$total_page = ceil($total_records / $limit);
      
    $offset = ($page-1)*$limit;
    $no=0;
    $query = mysqli_query($con,"SELECT * FROM `users` LIMIT {$offset}, {$limit} ");
    while($row = mysqli_fetch_array($query))
    {  
        $no++;
        
        ?>
        <tr>
            
            <th scope="row"><?php  echo $no; ?></th>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?> "  class="btn btn-warning text-white ">Edit</a>  
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger ">Delete</a>
            </td>
            </tr>
        <?php }
    ?>      
  </tbody>
</table>
            <?php 
            $sql = "SELECT * FROM users";
            $result = mysqli_query($con, $sql) or die("Query Failed!");

            if(mysqli_num_rows($result) > 0 )
            {
              $total_records = mysqli_num_rows($result);
              
              $total_page = ceil($total_records / $limit);
              echo '<ul class="pagination justify-content-center">';
                 for($i=1; $i<= $total_page; $i++){ 
                  
                  echo '<li class="page-item "> <a href=report.php?page='.$i.'" class="page-link">'.$i.'</a> </li>';
              }
              echo '</ul>';
            }
            
            ?>

</div>


<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
