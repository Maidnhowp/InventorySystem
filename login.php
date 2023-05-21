<?php
    include('server.php');
    session_start();

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $error = "";

        if(!empty($username) and !empty($password)) {
            $sql = "SELECT * FROM user where username = '$username' and password = '$password'";
            $query = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query) == 0) {
                $error = "Wrong username and password combination";
            } else {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['username'] = $row['username'];
                header('location: index.php');
            }
        } else {
            $error = "Please fill all of the form";
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
</head>
<body>
    <form action="login.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" value="<?= $_SESSION['filled']['username'] ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
        if(!empty($error)) {
            echo "<p>$error</p>";
        } 
    ?>
</body>
</html>