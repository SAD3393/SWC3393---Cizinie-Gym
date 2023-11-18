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

extract($_POST);

if(isset($_POST["checkout"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $code = $_POST["code"];
    $state = $_POST["state"];
    $nameCard = $_POST["nameCard"];
    $ccNo = $_POST["ccNo"];
    $exp = $_POST["exp"];
    $cvc = $_POST["cvc"];
    
    $sql = "INSERT INTO paymentInformation (id,memberplan_id,membership_total,name,address,city,code,state, nameOnCard, ccNo, exp, cvc) VALUES 
    ('$user_id','$plan_id','$planPrice','$name','$address','$city','$code','$state','$nameCard','$ccNo','$exp','$cvc')";

    if(mysqli_query($conn, $sql)) {
        header("location: thankyou.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PaymentPage.css">
    <title>Payment Page</title>
</head>
<body>
    <div id="cont-container">
        <div id="container">
            <form action="" method="post">
                <div id="row">
                    <div id="col">
                        <h3 class="title">Billing address</h3>

                        <div class="inputBox">
                            <span>Full name : </span>
                            <input type="text" placeholder="" size="100" class="fName" id="fName" name="name" required>
                        </div>

                        <div class="inputBox">
                            <span>Address : </span>
                            <input type="text" placeholder="" size="100" class="address" id="address" name="address" required>
                        </div>

                        <div class="inputBox">
                            <span>City : </span>
                            <input type="text" placeholder="" size="100" class="city" id="city" name="city" required>
                        </div>

                        <div class="inputBox">
                            <span>Postal Code :</span>
                            <input type="number" placeholder="" class="code" id="code" name="code" required>
                        </div>
                    

                        <div class="inputBox">
                            <span>State : </span>
                            <input type="text" placeholder="" size="60" class="state" id="state" name="state" required>
                        </div>
                    </div>    
                    <div id="col">
                        <h3 class="title">Payment</h3>

                        <div class="inputBox">
                            <span>Cards accepted : </span>
                            <img  src="https://www.pngkit.com/png/detail/147-1471566_credit-card-logos-mastercard-and-visa-payment.png" alt="" class="cards">
                        </div>

                        <div class="inputBox">
                            <span>Name on card :</span>
                            <input type="text" placeholder="John Deo" class="nameCard" id="nameCard" name="nameCard" required>
                        </div>

                        <div class="inputBox">
                            <span>Credit card Number :</span>
                            <input type="text" placeholder="1234-1234-1234-1234" class="ccNo" id="ccNo" name="ccNo" required>
                        </div>

                        <div class="inputBox">
                            <span>Expiration :</span>
                            <input type="text" placeholder="MM/YY" class="exp" id="exp" name="exp" required>
                        </div>
                        <div class="inputBox">
                            <span>CVC :</span>
                            <input type="text" placeholder="1234" class="cvc" id="cvc" name="cvc" required>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Proceed to checkout" class="submit-btn" name="checkout">
                
            </form>
        </div>
        <div class="cont-img">
             <img src="img\img4.jpg" alt="" class="imgBg">
        </div>
    </div>
</body>
</html>