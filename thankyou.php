<?php

include("config.php");

session_start();

if(isset($_SESSION['user_id'])){
    $plan_id = $_SESSION['plan_id'];
    $user_id = $_SESSION['user_id'];
    $planPrice = $_SESSION['plan_price'];
}else{
   $user_id = '';
   echo 'Please log in first';
};

$select = "SELECT * FROM informationform WHERE id = ?";
$stmt = $conn->prepare($select);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('i', $user_id);

    // Execute the query
    $stmt->execute();

    // Bind the result set to variables
    $stmt->bind_result($id, $name, $gender, $idoption, $idnumber, $birthdy, $email, $addressone, $addresstwo, $postcode, $city, $country, $phone);

    // Fetch the data
    $stmt->fetch();

    // Store the data in session variables
    $_SESSION['email'] = $email;
    $_SESSION['full_name'] = $name;
    $_SESSION['gender'] = $gender;
    $_SESSION['idnumber'] = $idnumber;
    $_SESSION['birthdy'] = $birthdy;
    $_SESSION['addressone'] = $addressone;
    $_SESSION['addresstwo'] = $addresstwo;
    $_SESSION['postcode'] = $postcode;
    $_SESSION['city'] = $city;
    $_SESSION['country'] = $country;
    $_SESSION['phone'] = $phone;

    // Close the statement
    $stmt->close();
}

$select = "SELECT name,address,city,state,code,nameOnCard,ccNo,exp,cvc FROM paymentinformation WHERE id = ?";
$stmt = $conn->prepare($select);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('i', $user_id);

    // Execute the query
    $stmt->execute();

    // Bind the result set to variables
    $stmt->bind_result( $name, $address, $city, $state, $code, $nameOnCard, $ccNo, $exp, $cvc);

    // Fetch the data
    $stmt->fetch();

    // Store the data in session variables
    $_SESSION['name'] = $name;
    $_SESSION['address'] = $address;
    $_SESSION['postcode'] = $postcode;
    $_SESSION['city'] = $city;
    $_SESSION['code'] = $code;
    $_SESSION['state'] = $state;
    $_SESSION['nameOnCard'] = $nameOnCard;
    $_SESSION['exp'] = $exp;
    $_SESSION['cvc'] = $cvc;
    $_SESSION['ccNo'] = $ccNo;

    // Close the statement
    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Receipt</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="sstyle.css">

</head>
<body>
   <h1 style="text-align: center;"><img src="img/logo.jpg" alt="" style="width: 100px; height: 100px;"><br>Thank you for your purchase!</h1>

   <?php
        
        $date = date("d-m-Y");
        
        extract($_POST); 
        
        ?>
        <p style="text-align: center;">Date: <b><?php print($date) ?></b></p>
        <h3 style="text-align: center;">CIZINIE GYM MEMBERSHIP</h3>
        <table align="center">
            <tr>
                <td>Full Name</td>
                <td>:</td>
                <td><b><?php echo $_SESSION['full_name'] ?></b></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><b><?php echo $_SESSION['gender'] ?></b></td>
            </tr>
            
            <tr>
                <td>ID number</td>
                <td>:</td>
                <td><b><?php  echo $_SESSION['idnumber']  ?></b></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>:</td>
                <td><b><?php  echo $_SESSION['birthdy']  ?></b></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><b><?php  echo $_SESSION['email']  ?></b></td>
            </tr>
            <tr>
                <td>Phone No</td>
                <td>:</td>
                <td><b><?php  echo $_SESSION['phone']  ?></b></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><b><?php echo $_SESSION['addressone'] .", ".$_SESSION['addresstwo'] .", ".$_SESSION['postcode'] .", ".$_SESSION['city'] .", ".$_SESSION['country'] ."</span> </p>"?></b></td>
            </tr>
            <tr>
                <td>Total Payment</td>
                <td>:</td>
                <td><b>RM <?php  echo $planPrice ?></b></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>BILLING ADDRESS</td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>:</td>
                <td><b><?php print($name) ?></b></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><b><?php print($address.", ".$city.", ".$code.", ".$state."</span> </p>")?></b></td>
            </tr><tr>
                <td>Name on card</td>
                <td>:</td>
                <td><b><?php print($nameOnCard) ?></b></td>
            </tr>
            <tr>
                <td>Credit card number</td>
                <td>:</td>
                <td><b><?php print($ccNo) ?></b></td>
            </tr>
            <tr>
                <td>Expiration</td>
                <td>:</td>
                <td><b><?php print($exp) ?></b></td>
            </tr>
            <tr>
                <td>CVC</td>
                <td>:</td>
                <td><b><?php print($cvc) ?></b></td>
            </tr> 
            <tr>
                <td>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="homepage.php"><input type="button" name="printButton" value="Home Page" style="align-item: center;"></a>
                <input type="button" name="printButton" onClick="window.print()" value="Print" style="align-item: center;"></td>
                <td></td>

            </tr>
        </table>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://kit.fontawesome.com/d938dc7e27.js" crossorigin="anonymous"></script>
   
</body>
</html>