<link rel="stylesheet" href="admin.css">
<?php include('connection.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD ADMIN</title>
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
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; ADD ADMIN</span>
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


<div class="main-content">
    <div class ="wrapper">
    <h1>Add Staff</h1>

    <!-- Display session message if set -->
    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>

    <!-- Form for adding staff -->
    <form action ="" method="POST">

        <table class="tbl-one">
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                     <input type="password" name="password" placeholder=" Your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>

</div>
</div>


<!-- PHP logic for adding admin -->
<?php
    if(isset($_POST['submit']))
   
{
    $full_name = $_POST['full_name'];
    $password = md5($_POST['password']);

    $sql ="INSERT INTO setting_admin SET 
    full_name='$full_name',
    -- username='$username',
    password='$password'
    ";

   
    $res = mysqli_query($conn , $sql) or die(mysqli_error());

    if($res==true)
    {
        //echo "Data Inserted";
        $_SESSION ['add'] = "Admin added successsfully";
        header("location:".SITEURL. "manage-staff.php");
    }
    else{
        //echo "Failed to insert data";
        $_SESSION['add'] ="Failed to Add Admin";
        header("location:".SITEURL. 'manage-staff.php');
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
