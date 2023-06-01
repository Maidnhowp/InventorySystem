<?php
    include('../server.php');
    session_start();
    $username = "";


    if(isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $error = "";

        if(!empty($username) and !empty($password)) { 
            $sql = "SELECT * FROM user where username = '$username' and password = '$password'";
            $query = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query) == 0) {
                $error = "Wrong username and password combination";
            } 
            else {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header('location: index.php');
            }
        } 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/forLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <h2>Sign Up</h2>

            <div class="box">
                <input type="text" name="username" id="username" value="<?= $username ?>" required>
                <i class="fa-regular fa-user"></i>
                <span>username</span>
            </div>

            <div class="box">
                <input type="password" name="password" id="password" required>
                <i class="fa-solid fa-lock"></i>
                <span>password</span>
            </div>

            <?php
                if(!empty($error)) {
                    echo "<div class='box'><p id='errorText'>$error</p></div>";
                } 
            ?>

            <div class="box">
                <button type="submit" name="login" id="login-btn">Login</button>
            <div>

            <div class="box">
                <div id="slash"></div>
                <strong>or</strong>
                <p>ยังไม่ได้ลงทะเบียนใช่หรือไม่? <a href="register.php">ลงทะเบียนที่นี่</a></p>
            </div>
        </form>
    </div>
</body>
</html>
