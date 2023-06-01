<?php
    include('../server.php');
    session_start();
    
    if(isset($_SESSION['username'])){
        $location = 'login.php';
    }
    $searchValue = "";

    if(isset($_GET)){

    }
    // if(isset($_POST['query'])){
    //     $inputText = $_POST['query'];
    //     $sql = "SELECT * FROM item WHERE name LIKE '%$inputText%'";
    //     $result = mysqli_query($conn, $sql);
    //     if($result->num_rows>0){
    //         while($row=$result->fetch_assoc()){
    //             echo '<a href="">' . $row["name"] . '</a>';
    //         }
    //     }
    //     else {
    //         echo '<p>No record.</p>';
    //     }
    // }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/forHome.css">
    <link rel="stylesheet" href="../css/forIndex.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <link rel="stylesheet" href="../css/forModal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php 
        include('../navbar.php');
        include('../modal.php');
        $sql = "SELECT * FROM item";
        if(isset($_GET["search"])){
            $search = mysqli_escape_string($conn,$_GET["search"]);
            $sql .= " WHERE name LIKE '%$search%'";
            $searchValue = $search; 
        }
        $sql .= " ORDER BY cost ASC";
        $result = mysqli_query($conn,$sql);
        $items = mysqli_fetch_all($result,MYSQLI_ASSOC);
    ?>
    <div class="big">
    <div class="nav">
        <img src="https://cdn.discordapp.com/attachments/856855218427265024/1113147353902362686/icon.png" alt="รูปไอคอน">
        <form>
            <input type="search" placeholder=" Search" name="search" id="search" value="<?= $searchValue ?>">
            <button type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <div class="container">
        <h3 id="show-count-product">รายการสินค้าทั้งหมด <?php echo count($items)?> รายการ</h3>
        <div class="product-list">
            <?php foreach($items as $item) :?>
                <div href="" class="product">
                    <a href="" class="desc">
                        <?php 
                            $full_des = explode(",", $item["des"]);
                            $bran = $full_des[0];
                            $detail = $full_des[1];
                        ?>
                        <product-img> <img src="<?php echo $item['pic']?>" alt="รูปสินค้า"> </product-img>
                        <product-name> <h3><?php echo $item['name']?></h3> </product-name>
                        <product-bran> <h5><?php echo $bran?></h5> </product-bran>
                        <product-detail> <small><?php echo $detail?></small> </product-detail>
                    </a> 
                    <div>
                        <button id="add-btn" onclick="window.location.href='home.php?#';"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </div>

    <?php include("../footer.php")?>
    </div>
</body>
</html>

<script src="../script/cart.js"></script>