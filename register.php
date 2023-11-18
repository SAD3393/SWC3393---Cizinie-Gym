<?php 

@include 'config.php';

if(isset($_POST['register_btn'])){
        
        $email=($_POST['email']);
        $password_1  =($_POST['password_1']);
        $password_2  =($_POST['password_2']);
        $usertype = 'user';
        $memberplan_id = '4';

        $select = "SELECT * FROM users WHERE email = '$email' && password = '$password_1' ";

        $result = mysqli_query($conn, $select);
        
        if (empty($email)) { 
                $error[] = "Email is required"; 
        }
        if (empty($password_1)) { 
                $error[] = "Password is required"; 
        }
        if ($password_1 != $password_2) {
                $error[] = "The passwords do not match";
        }
        if(mysqli_num_rows($result) > 0){
                $error[] = "User already exist!";
        }
        // register user if there are no errors in the form
        if(!isset($error)){
                $insert = "INSERT INTO users (email, user_type, password,memberplan_id) VALUES ( '$email', '$usertype', '$password_1', '$memberplan_id')";
                mysqli_query($conn, $insert);
                header('Location: login.php');
        }

};
?>

<!DOCTYPE html>
<html>
<head>
        <title>Registration system</title>
        <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
<div class="header">
        <h2>Register</h2>
</div>
<form method="post" action="">
        </div>
        <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" >
        </div>
        <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
        </div>
        <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
        </div>
        <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Register</button>
        </div>
        <p>
                Already a member? <a href="login.php">Sign in</a>
        </p>
</form>
</body>
</html>