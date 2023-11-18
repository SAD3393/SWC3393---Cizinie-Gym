<!-- Include the connection.php file to establish a connection to the database -->
<?php include('connection.php');?>
<?php

    
    // Get the 'id' parameter from the GET request
     $id = $_GET['id']; 

    $sql = "DELETE FROM setting_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "Admin deleted successfully";
        // Redirect to the 'manage-staff.php' page after successful deletion
        header('location:' .SITEURL. 'manage-staff.php');
    }
    else
    {
        $_SESSION['delete'] = "Failed to delete admin. Try again later";
        // Redirect to the 'manage-staff.php' page after unsuccessful deletion
        header('location:' .SITEURL. 'manage-staff.php');
    }
?>