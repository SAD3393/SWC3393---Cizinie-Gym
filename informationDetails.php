<?php

include("config.php");

session_start();

//Get user id
if(isset($_SESSION['user_id'])){
    $plan_id = $_SESSION['plan_id'];
    $user_id = $_SESSION['user_id'];
    $planPrice = $_SESSION['plan_price'];
}else{
   $user_id = '';
   echo 'Please log in first';
};

//Call data from previous page
extract($_POST);

if (isset($_POST["register"])) {
    $date = $_POST["startdate"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $idoption = $_POST["idoption"];
    $idnumber = $_POST["idNo"];
    $birthdy = $_POST["birthdy"];
    $email = $_POST["email"];
    $addressone = $_POST["addressone"];
    $addresstwo = $_POST["addresstwo"];
    $postcode = $_POST["postcode"];
    $city = $_POST["city"];
    $phone = $_POST["phone"];

    // create query for membership table
    $membershipQuery = "UPDATE users SET memberplan_date=$date WHERE id= $user_id";

    if (mysqli_query($conn, $membershipQuery)) {
        // if membership query is successful, proceed to informationform table
        $informationformQuery = "INSERT INTO informationform (id,name, gender, idoption, idnumber, birthdy,
            email, addressone, addresstwo, postcode, city, phone) 
            VALUES ('$user_id','$name', '$gender', '$idoption', '$idnumber', '$birthdy',
            '$email', '$addressone', '$addresstwo', '$postcode', '$city', '$phone')";
            
        if (mysqli_query($conn, $informationformQuery)) {
            $staffFormQuery = "INSERT INTO members (id,full_name, ic_number, email,
        joining_date, membership_plan, price, phone,gender) 
        VALUES ('$user_id','$name', '$idNo', '$email', '$date', '$plan_id',
        '$planPrice','$phone', '$gender')";
            if (mysqli_query($conn, $staffFormQuery)) {
                // if both queries are successful, redirect
                header("location: PaymentPage.php");
            } else {
                echo "Error: " . $informationformQuery . "<br>" . mysqli_error($conn);
            }

    } else {
        echo "Error: " . $membershipQuery . "<br>" . mysqli_error($conn);
    }}
    else {
        echo "Error: " . $membershipQuery . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
    <link rel="stylesheet" href="css/informationPage.css">
</head>
<body>
    <h2 style="color: black; font-size: 2.25rem; text-align: center;">Please fill in your information details to register</h2>
    <form action="" method="post">
        <div class="title">
            <h2>2. Choose your start date</h2>
        </div>
        <div class="container">
            <div class="cont-container">
                <label for="">Date: </label>
                <input type="date" min="2023-11-17" max="2023-12-31" name="startdate" value="<?= isset($_POST['startdate']) ? htmlspecialchars($_POST['startdate']) : '' ?>" placeholder=" " class="date">
            </div>
        </div>
   
        <div class="title">
            <h2>3. Fill In Your Information Details</h2>
        </div>
        <div class="container half">
            <div class="cont-container item">
                <label for="">Name</label>
                <input type="text" name="name" id="name" size="120" placeholder="Full Name" value="" required>
            </div>
            <div class="cont-container radio">
                <label for="">Gender</label>
                <label class="option">Male<input type="radio" name="gender" id="gender" value="male"><span class="checkmark"></span></label>
                <label class="option">Female<input type="radio" name="gender" id="gender" value="female"><span class="checkmark"></span></label>
            </div>
        </div>
        <div class="container">
            <div class="cont-container radio">
                <label for="">Select your id:</label>
                <label class="option">NRIC<input type="radio" name="idoption" id="idNo" value="NRIC"><span class="checkmark"></span></label>
                <label class="option">Passport <input type="radio" name="idoption" id="idNo" value="passport"><span class="checkmark"></span></label>
            </div>
            <div class="cont-container">
                <label for="">Enter your id: </label>
                <input type="text" name="idNo" id="idNo" placeholder="NRIC or Passport" value="" required>
            </div>
        </div>
        <div class="container">
            <div class="cont-container">
                <label for="">Date of Birth</label>
                <input type="date" min="1903-12-31" max="2005-11-17" name="birthdy" value="" placeholder=" " class="date">
            </div>
            <div class="cont-container">
                <label for="">Email: </label>
                <input type="email" name="email" size="60" placeholder="Email" value="" required>
            </div>
        </div>

        <div class="container">
            <div class="cont-container address">
                <label for="">Address: </label>
                <input type="text" name="addressone" id="address" size="120" placeholder="Address line 1" value="" required>
            </div>
        </div>
        <div class="container">
            <div class="cont-container address">
            <input type="text" name="addresstwo" id="address" size="120" placeholder="Address line 2" value="" required>
            </div>
        </div>
        <div class="container">
            <div class="cont-container code">
                <label for="">Post code: </label>
                <input type="number" name="postcode" id="postcode" size="6" placeholder="Post Code" value="" required>
            </div>
            <div class="cont-container code">
                <label for="">City/Province/State: </label>
                <input type="text" name="city" id="city" size="60" placeholder="City/Province/State" value="" required>
            </div>
            <div class="cont-container code">
                <label for="">Country</label>
                <input type="text" name="country" id="country" size="20" placeholder="Malaysia" value="" disabled>
            </div>
        </div>
        <div class="container" class="full">
            <div class="cont-container">
                <label for="">Phone number(+60):</label>
                <input type="number" name="phone" id="phoneNo" size="12" placeholder="123456789">
            </div>
        </div>
        <div class="container last">
            <div class="cont-container">
                <p class="price">Total Payment: RM <?php echo $_SESSION['plan_price'] ?></p>
            </div>
            <div class="action">
                <input type="submit" class="submit" name="register" value="MAKE PAYMENT" href="PaymentPage.html">
            </div>
        </div>
    </form>
        
</body>
</html>