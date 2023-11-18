<?php
// include database connection
require_once "connection.php";

// Fetch member data from the database
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

// Check if there are any members
if ($result->num_rows > 0) {
    $members = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $members = [];
}

// close database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MEMBER REPORT</title>
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
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; MEMBER REPORT</span>
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

        <!-- Content section with member report table -->
        <div class="content">
            <h2>Member Report</h2>

            <!-- Table structure for displaying member data -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>IC Number</th>
                        <th>Joining Date</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Loop through members and display their information in table rows -->
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo $member['id']; ?></td>
                            <td><?php echo $member['full_name']; ?></td>
                            <td><?php echo $member['ic_number']; ?></td>
                            <td><?php echo $member['joining_date']; ?></td>

                            <!-- Edit and Delete buttons -->
                            <td>
                                <a href="edit_member.php?id=<?php echo $member['id']; ?>">Edit</a>

                                <a href="delete_member.php?id=<?php echo $member['id']; ?>" onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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