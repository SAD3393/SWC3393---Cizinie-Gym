<?php

@include 'config.php';

session_start();

if(isset($_POST['login_btn'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM users WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    if($row = mysqli_fetch_assoc($result)){

        // Store the data in session variables
        $_SESSION['email'] = ['email'];
        $_SESSION['user_type'] = $row['user_type'] ;
        $userEmail = $_SESSION['email'];
        $user_type = $_SESSION['user_type'];

        if($row['user_type'] == 'admin'){
            $message[] = "Welcome to Dashboard";
            header('Location: Admin Panel\staffindex.php');
        }
        else {
            $message[] = "Logged in Successfully";
            header('Location: homepage.php');
        }
    }
    else {
        $error[] = 'Incorrect email or password!';
    }

    $select = "SELECT id FROM users WHERE email = ? ";

        $stmt = $conn->prepare($select);
        $stmt->bind_param('s', $email);

        if (!$stmt->execute()) {
        // Handle the error if the execution fails
        die("Error executing query: " . $stmt->error);
        }

        $stmt->bind_result($id);

        if (!$stmt->fetch()) {
        // Handle the case where no results are fetched
        die("No user found with the provided email");
        }

        // Close the statement
        $stmt->close();

        // Store values in session
        $_SESSION['user_id'] = $id;
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
<?php

if(isset($error)){
    foreach($error as $error){
        echo '<span class="error-msg">'.$error.'</span>';
    }
}
?>
        <div class="header">
                <h2>Login</h2>
        </div>
        <form method="post" action="">

                <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" >
                </div>
                <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password">
                </div>
                <div class="input-group">
                        <button type="submit" class="btn" name="login_btn"> LOGIN</button>
                </div>
                <p>
                        Not a member yet? <a href="register.php">Sign up</a>
                </p>
        </form>
</body>
</html>