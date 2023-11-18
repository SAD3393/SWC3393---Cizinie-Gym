<?php 
include('config.php'); //Connect with database

session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Cizinie Gym | Home </title>
    <link rel="stylesheet" href="css/homestyle.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  </head>
  <body>
  <?php
    if (isset($message)){
      foreach($message as $message){
          echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display= `none` ;"></i></div>';
      };
  }
?>
<!-- Include header file -->
    <?php include('header.php'); ?>

    <section class="home">
      <div class="max-width">
        <div class="home-content">
          <h3>Help for ideal <br> body fitness</h3>
          <p>Cizinie Gym is a state-of-the-art fitness facility that offers a wide range of amenities 
            and services to help you reach your fitness goals. Whether 
            you're a beginner or a seasoned athlete, we have something for everyone.</p>
            <button class="btn"><a type="hidden" href="MemberPlan.php">Get Started</a></button>
        </div>
        <div class="home-image">
          <img src="img\gym6.png" alt="">
        </div>
      </div>

    </section>

    
  </div>
  </body>
</html>