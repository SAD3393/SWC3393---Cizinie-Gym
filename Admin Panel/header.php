<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HEADER</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="staff.css">
</head>
<body>
    <!-- Side Navigation Bar -->
    <div class="sidenav" id="mySidenav">

        <!-- Gym name logo -->
        <p class="logo"><span>CIZINIE</span> GYM</p>
        
        <!-- Navigation Links with Font Awesome Icons -->
        <a href="staffindex.php"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
        <a href="memberreport.php"><i class="fas fa-search"></i>&nbsp;&nbsp;Member report</a>
        <a href="memberform.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Member form</a>
        <a href="finance.php"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;Finance Report</a>
        <a href="add-admin.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Staff form</a>
        <a href="manage-staff.php"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Your Account</a>
    </div>

    <!-- Main Content Section -->
    <div id="main">
        <div class="header">

            <!-- Left Column with Hamburger Icon for Side Navigation Toggle -->
            <div class="col-div-6">
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; MANAGE STAFF</span>
            </div>
            
            <!-- Right Column with User Profile Information -->
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
