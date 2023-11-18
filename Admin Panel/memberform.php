
<?php
// include database connection
require_once "connection.php";

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["name"];
    $ic_number = $_POST["nicno"];
    $joining_date = $_POST["date"];
    $emergency_contact_person = $_POST["emergency"];
    $relationship = $_POST["relationship"];
    $membership_plan = $_POST["membership_plan"];
    $price = $_POST["price"];
    $phone = $_POST["phone"];
    $emergency_contact_number = $_POST["emergency_contact_number"];
    $gender = $_POST["gender"];

        $sql = "INSERT INTO members (full_name, ic_number, joining_date, emergency_contact_person, 
        relationship, membership_plan, price, phone, emergency_contact_number, gender) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        // Check if the prepare was successful
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssssssdsss", $full_name, $ic_number, $joining_date, $emergency_contact_person, $relationship, $membership_plan, $price, $phone, $emergency_contact_number, $gender );

            // Execute the statement
            if ($stmt->execute()) {
                // success
                echo "Add New member is successful!";
                header('Location: staffindex.php');
            } else {
                // error
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // error in preparing the statement
            echo "Error: " . $conn->error;
    }
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
                <span style="font-size: 30px; cursor: pointer; color: white;" onclick="openNav()">&#9776; MEMBER FORM</span>
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


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Member</h4>
                </div>

                <!-- Modal for adding a new member -->
                <div class="modal-body">

                    <!-- Form for adding a new member -->
                    <form role="form" id="formMember" method="post">
                        <!-- Form fields for member information -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                        </div>

                        <div class="form-group">
                            <label for="nicno">IC Number</label>
                            <input type="text" class="form-control" id="nicno" name="nicno" placeholder="IC Number" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Joining Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="emergency">Emergency Contact Person</label>
                            <input type="text" class="form-control" id="emergency" name="emergency" placeholder="Emergency Contact Person" required>
                        </div>

                        <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Relationship" required>
                        </div>

                        <div class="form-group">
                            <label>Membership Plan</label>
                            <div>
                                <label><input type="radio" name="membership_plan" value="trial" required> Trial Plan (RM10.00/Entry)</label>
                                <label><input type="radio" name="membership_plan" value="day" required> Basic Plan (RM150.00/Month)</label>
                                <label><input type="radio" name="membership_plan" value="month" required> VIP Plan (RM220.00/Month)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        </div>

                        <div class="form-group">
                            <label for="emergency_contact_number">Emergency Contact Number</label>
                            <input type="text" class="form-control" id="emergency_contact_number" name="emergency_contact_number" placeholder="Emergency Contact Number" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                                <label><input type="radio" name="gender" value="male" required> Male</label>
                                <label><input type="radio" name="gender" value="female" required> Female</label>
                            </div>
                        </div>

                        <!-- button to add new member -->
                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </form>
                </div>
            </div>
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