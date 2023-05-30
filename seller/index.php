<?php
    session_start();
    include('../server.php');

    if(!isset($_SESSION['username']) or !$_SESSION['role'] == 'supplier') {
        header('refresh: 0, url: /INVENTORYSYSTEM/');
    }

    $query = "SELECT * FROM item INNER JOIN supply ON id = itemid WHERE sid = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>My Product</h1>
    <button>Add product</button>
    <?php
        if(mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    ?>
        <table>
            <tr>
                <th>picture</th>
                <th>name</th>
                <th>category</th>
                <th>price</th>
                <th>product cost</th>
                <th>description</th>
                <th>quantity</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            <?php
                foreach($rows as $i => $data) {
            ?>
                <tr>
                    <td><img src="<?= $data['pic'] ?>" alt="picture"></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['category'] ?></td>
                    <td><?= $data['price'] ?></td>
                    <td><?= $data['cost'] ?></td>
                    <td><?= $data['des'] ?></td>
                    <td><?= $data['qty'] ?></td>
                    <td><button>update</button></td>
                    <td><button>delete</button></td>
                </tr> 
            <?php
                }
            ?>    
        </table>
    <?php
        } else {
            echo "<h2>No product have been place yet</h2>";
        }
    ?>
    
    
</body>
</html>