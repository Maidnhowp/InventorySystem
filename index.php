<?php
    include('server.php');
    session_start();

    if(isset($_GET['logout'])) {
        unset($_SESSION['username']);
        session_destroy();
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
    <?php if(!isset($_SESSION['username'])) { ?>
        <a href="register.php"><button>sign up</button></a>
        <a href="login.php"><button>sign in</button></a>
    <?php } else { ?>
        <a href="index.php?logout"><button>log out</button></a>
    <?php } ?>
</body>
</html>