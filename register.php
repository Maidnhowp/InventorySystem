<?php
    session_start();
    $username = "";
    $email = "";

    if(isset($_SESSION['username'])) {
        header('location: index.php');
    }

    if(isset($_POST['register'])) {
        include('server.php');
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $error = "";

        // if(!isset($_SESSION['filled'])) {
        //     $_SESSION['filled'] = array('username'=>$username, "email"=>$email);
        // } else {
        //     $_SESSION['filled']['username'] = $username;
        //     $_SESSION['filled']['email'] = $email;
        // }

        //all form is not empty 
        if(!empty($username) and !empty($password) and !empty($password2) and !empty($email)) {        
            $sql = "SELECT * FROM user where username = '$username' or email = '$email'";
            $query = mysqli_query($conn, $sql);

            if($password != $password2) {
                $error = "Password and Confirm Password doesn't match";
            }

            if(mysqli_num_rows($query) > 0) {
                $error = "This username or email is already used";
                unset($_SESSION['filled']);
            }

            //register complete
            if($error == "") {
                // unset($_SESSION['filled']);
                $sql = "INSERT INTO user(username, password, email) VALUES('$username', '$password', '$email')";
                mysqli_query($conn, $sql);
                
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header('location: index.php');
            }

        } else {
            $error = "Please fill all of the form";
        }
    }

    // unset($_SESSION['filled']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div>
        <form action="register.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="<?= $username ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?= $email ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2">
            </div>
            <button type="submit" name="register">Register</button>
        </form>
        <div>
            <a href="login.php">Already a member?</a>
        </div>
        <?php
            if(!empty($error)) {
                echo "<p>$error</p>";
            } 
        ?>
    </div>
</body>
</html>