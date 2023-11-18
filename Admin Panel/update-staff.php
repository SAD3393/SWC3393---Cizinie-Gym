<!-- Include the PHP connection script -->
<?php include('connection.php');?>
<!-- Include the admin stylesheet -->
<link rel="stylesheet" href="admin.css">

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="staff.css">
</head>
<body>

    <div class="sidenav" id="mySidenav">

        <p class="logo"><span>CIZINIE</span> GYM</p>

        <a href="staffindex.php"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
        <a href="memberreport.php"><i class="fas fa-search"></i>&nbsp;&nbsp;Member report</a>
        <a href="memberform.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Member form</a>
        <a href="finance.php"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;Finance Report</a>
        <a href="add-admin.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Staff form</a>
        <a href="manage-staff.php"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Your Account</a>
    </div>

    <div id="main">
        <div class="header">
            <div class="col-div-6">
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; UPDATE STAFF</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                    <i class="fas fa-user"></i>
                    <!-- <p><?php echo $adminUsername; ?></p> -->
                    <p>Admin</p>

                    <!-- <a href="logout.php">Logout</a>Add this line -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div>


<div class ="main-content">
    <div class ="wrapper">
    <h1>Update Staff</h1>
    <br><br>

    <!-- Retrieve staff details based on ID from the URL -->
    <?php
        $id = $_GET['id']; 

        $sql = "SELECT * FROM setting_admin WHERE id=$id ";
    
        $res = mysqli_query($conn, $sql);
        if($res==true)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                
            }
            else
            {
                header('location:' .SITEURL. 'manage-staff.php');
            }
        }
    ?>

    <!-- Form for updating staff details -->
    <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Full Name: </td>
            <td>
                <input type="text" name="full_name" value="<?php echo $full_name; ?>">
            </td>
        </tr>
        <tr>
        
        <!-- Hidden field to store staff ID -->
        <tr>
            <td colspan="2" >
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Detail Staff" class="btn-secondary">
            </td>
        </tr>

    </table>
    </form>
</div>
</div>

<!-- PHP code to update staff details -->
<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];

        $sql = "UPDATE setting_admin SET 
        full_name = '$full_name',
        WHERE id = '$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "<div class= 'success'>Staff Updated Succesfully.</div>";
            header('location:' .SITEURL. 'manage-staff.php');
        }
        else
        {
            $_SESSION['update'] = "<div class= 'error'>Failed to delete staff.</div>";
            header('location:' .SITEURL. 'manage-staff.php');
        }
    
    }
     
    

?>

    </div>

<script>
        function openNav() {
            var sidenav = document.getElementById("mySidenav");
            var main = document.getElementById("main");

            if (sidenav.style.width === "300px") {
                sidenav.style.width = "0px";
                main.style.marginLeft = "0px";
            } else {
                sidenav.style.width = "300px";
                main.style.marginLeft = "300px";
            }
        }
    </script>

</body>

<footer>
        <p>&copy; 2023 CIZINIE GYM. All Rights Reserved.</p>
</footer>

</html>
