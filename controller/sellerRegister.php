<?php
    session_start();
    
    if(!isset($_SESSION['username']) or $_SESSION['role'] == 'supplier') {
        header('Refresh: 0, url = /INVENTORYSYSTEM/');
    }
    
    if(isset($_POST['register'])) {
        include('../server.php');

        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $error = "";
        if(!preg_match('/^[0]{1}[6|8|9]{1}[0-9]{8}$/', $tel) or strlen($tel) > 10 or strlen($tel) < 10 or !is_numeric($tel)) {
            $error = "Pattern does not match"; 
        }
        if(!empty($error)) {
            echo $error;
        } else {
            $username = $_SESSION['username'];
            $query = "select * from user where username = '$username'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $query2 = "update user set role = 'supplier' where username = '$username'";
                $result2 = mysqli_query($conn, $query2);
                $id = $row['id'];
                $query3 = "INSERT INTO supplier(id, tel) VALUES('$id', '$tel')";
                $result3 = mysqli_query($conn, $query3);
                $_SESSION['role'] = 'supplier';
                // header('Refresh: 0, url = /INVENTORYSYSTEM/');
                header('location: home.php');
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
    <title>Document</title>
</head>
<body>
    <p>Enter your telephone number to start selling</p>
    <form action="sellerRegister.php" method="post">
        <label for="tel">Tel</label>
        <input type="text" name="tel">
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>