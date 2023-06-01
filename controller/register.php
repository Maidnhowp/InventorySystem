<?php
    include('../server.php');
    session_start();
    if(isset($_POST['username_check'])){
        $username = $_POST['username'];
        if(strlen($username) < 4){
            echo "fail";
        }
        else {
            echo "pass";
        }
        exit();
    }
    if(isset($_POST['password_check'])){
        $password = $_POST['password'];
        $_SESSION['password'] = $password;
        if (strlen($password) < 4){
            echo "fail";
        }
        else {
            echo "pass";
        }
        exit();
    }
    if(isset($_POST['password2_check'])){
        $password2 = $_POST['password2'];
        if ($password2 != $_SESSION['password']){
            echo "fail";
        }
        else {
            echo "pass";
            unset($_SESSION['password']);
        }
        exit();
    }
    if(isset($_POST['email_check'])){
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "fail";
        }
        else {
            echo "pass";
        }
        exit();
    }
    if(isset($_POST['save'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            echo "exists";
            exit();
        }
        else {
            date_default_timezone_set('Asia/Bangkok');
            $date = date("Y-m-d h:i:sa");
            $query = "INSERT INTO user (role,username,password,email,lastlogin) VALUES ('user','$username', '$password', '$email','$date')";
            $result = mysqli_query($conn, $query);
            echo 'Saved';
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forRegister.css">
</head>
<body>
    <div class="container">
        <form action="login.php" id="register_form">
            <h1>Register</h1>
            <div id="error_msg"></div>
            <div class="box">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" id="username" >
                <span></span>
            </div>
            <div class="box">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" id="email" >
                <span></span>
            </div>
            <div class="box">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" id="password">
                <span></span>
            </div>
            <div class="box">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" placeholder="Password2" id="password2">
                <span></span>
            </div>
            <div class="box">
                <button type="button" name="register" id="reg_btn">Register</button>
            </div>
        </form>
        <div>
            <a href="login.php">Already a member?</a>
        </div>
    </div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="../script/validateform.js"></script>