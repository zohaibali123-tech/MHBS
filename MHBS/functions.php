<?php
function getUsernameByID($id) {
    global $con;
    $query = mysqli_query($con,"SELECT fullname FROM users where id='$id'");
    $records = mysqli_num_rows($query);
    if($records>0){
        $row = mysqli_fetch_array($query);
        return $row["fullname"];
    }
    else
    {
        return 0;
    } 
}

?>