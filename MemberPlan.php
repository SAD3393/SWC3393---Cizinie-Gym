<?php

include("config.php");

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    echo $user_id;
    
}else{
    $user_id = '';
};

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

extract($_POST);

// Prepare the SQL query
$sql = "SELECT * FROM membership_plan WHERE id = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

try{
    if(isset($_POST["register"])) {
    $id_plan = intval($_POST["plan"]);

    $select = "SELECT * FROM membership_plan WHERE id = ?"; //Cari plan from db ikut yg user pilih
    $stmt = $conn->prepare($select);
    $stmt->bind_param('i', $id_plan);
    $stmt->execute();
    $stmt->bind_result($id, $name, $price); //senaraikan data from db
    $stmt->fetch();
    $stmt->close();

    // Store the data in session variables
    $_SESSION['plan_id'] = $id;
    $_SESSION['plan_name'] = $name;
    $_SESSION['plan_price'] = $price;

    $update = "UPDATE users SET memberplan_id='$id' WHERE id='$user_id'";

    if ($conn->query($update) === TRUE) {
        header("location: informationDetails.php");
    } else {
    echo "Error updating record: " . $conn->error;
    }

    }
} catch (Exception $e) {

echo $e->getMessage();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/memberPlan.css">
    <link rel="stylesheet" href="css/header.css">

    <title>Membership</title>
</head>
<body>
    <?php include ("header.php"); ?>
    <div class="header" style="margin-top: 4rem;">
        <h1>Membership Plan</h1>
        <h2 >1. Choose Plan</h2>
    </div>
    <form action="" method="post" style="margin-top: 8rem;">
        <section id="pricing section"> <!--pricing-->
            <div id="container">
                <div id="cont-container"><!--section data-->
                    <div id="body1">
                        <h1 class="MP-title-border">OUR</h1>
                        <h1 class="MP-title"><span>SPECIAL</span> PLAN!!</h1>
                    </div>
                </div>
                <div class="pricing-container grid">
                    <article class="pricing-card">
                        <header class="pricing-header">
                            <div class="pricing-shape">
                                <img src="img\price-1.png" alt="" class="pricing-img">
                            </div>
                            <h1 class="pricing-title">TRIAL PLAN</h1>
                            <h2 class="pricing-number">RM10.00/Entry</h2>
                        </header>

                        <ul class="pricing-list">
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i>Access weights and cardio equipment
                            </li>
                            <li class="pricing-item pricing-item-opacity">
                                <i class="fa-regular fa-circle-check"></i> Smart Workout Plan
                            </li>
                            <li class="pricing-item pricing-item-opacity">
                                <i class="fa-regular fa-circle-check"></i> At home workouts 
                            </li>
                            <li class="pricing-item pricing-item-opacity">
                                <i class="fa-regular fa-circle-check"></i> Group Classes
                            </li>
                            <li class="pricing-item pricing-item-opacity">
                                <i class="fa-regular fa-circle-check"></i> 3 Fitology Express Sessions
                            </li>
                        </ul>
                        
                        <label id="purchaseLabel" class="button button-flex pricing-button">
                            <input type="radio" name="plan" value="1">
                            Purchase Now<i class="fa-regular fa-circle-check"></i>
                        </label>
                    </article>

                    <article class="pricing-card pricing-card-active">
                        <header class="pricing-header">
                            <div class="pricing-shape">
                                <img src="img\price-2.png" alt="" class="pricing-img">
                            </div>

                            <h1 class="pricing-title">BASIC PLAN</h1>
                            <h2 class="pricing-number">RM150.00/MONTH</h2>
                        </header>

                        <ul class="pricing-list">
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i>Access weights and cardio equipment
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> Smart Workout Plan
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> At home workouts 
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> Group Classes
                            </li>
                            <li class="pricing-item pricing-item-opacity">
                                <i class="fa-regular fa-circle-check"></i> 3 Fitology Express Sessions
                            </li>
                        </ul>

                        <label class="button button-flex pricing-button" id="purchaseLabel">
                            <input type="radio" name="plan" value="2">
                            Purchase Now<i class="fa-regular fa-circle-check" id="circleIcon"></i>
                        </label>
                    </article>

                    <article class="pricing-card">
                        <header class="pricing-header">
                            <div class="pricing-shape">
                                <img src="img\price-3.png" alt="" class="pricing-img">
                            </div>

                            <h1 class="pricing-title">PREMIUM PLAN</h1>
                            <h2 class="pricing-number">RM220.00/MONTH</h2>
                        </header>

                        <ul class="pricing-list">
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> Access weights and cardio equipment
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> Smart Workout Plan
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> At home workouts 
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> Group Classes
                            </li>
                            <li class="pricing-item">
                                <i class="fa-regular fa-circle-check"></i> 3 Fitology Express Sessions
                            </li>
                        </ul>

                        <label id="purchaseLabel" class="button button-flex pricing-button">
                            <input type="radio" name="plan" value="3" required>
                            Purchase Now<i class="fa-regular fa-circle-check" id="circleIcon"></i>
                        </label>
                    </article>
                </div>
            </div>
        </section>
        <div class="action">
            <input type="submit" name="register" value="PROCEED" href="informationDetails.php">
        </div>
    </form>

    <script src="https://kit.fontawesome.com/d938dc7e27.js" crossorigin="anonymous"></script>
    <script>
    document.getElementById('purchaseLabel').addEventListener('click', function() ){
        this.classList.toggle('active');
    };
    </script>


</body>
</html>
