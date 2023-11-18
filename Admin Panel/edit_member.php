<?php
// Include database connection
require_once "connection.php";

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch member data based on the ID
    $sql = "SELECT * FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the member exists
    if ($result->num_rows > 0) {
        $member = $result->fetch_assoc();
    } else {
        // Redirect to the member report page if the member doesn't exist
        header('Location: memberreport.php');
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to the member report page if no ID is provided
    header('Location: memberreport.php');
    exit();
}

if(isset($_POST['update'])){ 
// Process form data on update submission
    $update_id = $_POST['id'];
    $update_full_name = $_POST['name'];
    $update_ic = $_POST['nicno'];
    $update_date = $_POST['date'];

    // Update member data in the database
    $update_query = mysqli_query($conn, "UPDATE `members` SET full_name = '$update_full_name', ic_number = '$update_ic', joining_date = '$update_date' WHERE id = '$update_id'");

    if($update_query){
        // Redirect to member report page if update is successful
        header('location: memberreport.php');
    }
    else{
        $message[] = 'Data could not be updated';
        header('location: edit_member.php');
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Member</title>
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
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; EDIT MEMBER</span>
            </div>

            <div class="col-div-6">
                <div class="profile">
                    <i class="fas fa-user"></i>
                    <p>Admin</p>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="content">
            <!-- Edit Member Form -->
            <h2>Edit Member</h2>
            <form action="" method="post">
                <!-- Hidden input to store member ID -->
                <input type="hidden" name="id" value="<?php echo $member['id']; ?>">

                <!-- Form fields for member data -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $member['full_name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nicno">IC Number</label>
                    <input type="text" class="form-control" id="nicno" name="nicno" value="<?php echo $member['ic_number']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="date">Joining Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $member['joining_date']; ?>" required>
                </div>

                <!-- Submit button for form submission -->
                <button type="submit" class="btn btn-primary" name="update">Update Member</button>
            </form>
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

