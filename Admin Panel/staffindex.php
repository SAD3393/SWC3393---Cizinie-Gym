<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIZINIE GYM - ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="staff.css">
</head>
<body>

    <!-- Sidebar navigation -->
    <div class="sidenav" id="mySidenav">

        <!-- Logo and navigation links -->
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

            <!-- Toggle button for the sidebar -->
            <div class="col-div-6">
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; DASHBOARD</span>
            </div>


            <!-- Profile information -->
            <div class="col-div-6">
                <div class="profile">
                    <i class="fas fa-user"></i>
                    <!-- <p><?php echo $adminUsername; ?></p> -->
                    <p>Admin</p>

                    <!-- <a href="logout.php">Logout</a>Add this line -->
                </div>
            </div>

            <!-- Clearfix to ensure proper layout -->
            <div class="clearfix"></div>
        </div>

        <!-- Welcome message -->
        <div class="welcome">
            <img src="images/logo.jpg">
            <h1>welcome back, admin!</h1>
        </div>
        
        <!-- Quick access links -->
        <div class="link">

            <!-- Member report box -->
            <div class="box">
                <h3>Member report</h3>
                <p>Find existing members in the system.</p>
                <a href="memberreport.php"><i class="fas fa-search"></i></a>
            </div>

            <!-- Member form box -->
            <div class="box">
                <h3>member form</h3>
                <p>Add a new member to the system.</p>
                <a href="memberform.php"><i class="fas fa-user-plus"></i></a>
            </div>

            <div class="box">
                <h3>finance report</h3>
                <p>View financial reports for the gym.</p>
                <a href="finance.php"><i class="fas fa-chart-line"></i></a>
            </div>

            <!-- Finance report box -->
            <div class="box">
                <h3>Staff form</h3>
                <p>Add a new staff to the system.</p>
                <a href="add-admin.php"><i class="fas fa-user-plus"></i></a>
            </div>

            <!-- Staff form box -->
            <div class="box">
                <h3>your account</h3>
                <p>Manage your admin account settings.</p>
                <a href="manage-staff.php"><i class="fas fa-user-cog"></i></a>
            </div>
        </div>

    </div>


<!-- JavaScript function for opening/closing the sidebar -->
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


<!-- Footer section -->
<footer>
        <p>&copy; 2023 CIZINIE GYM. All Rights Reserved.</p>
</footer>
</html>
