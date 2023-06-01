<?php
    include('../server.php');
    session_start();
    $searchValue = "";

    if(isset($_GET['logout'])) {
        unset($_SESSION['username']);
        session_destroy();
    }
    if(isset($_SESSION['username'])){
        $location = "home.php";
    }
    else {
        $location = "login.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <title>Home</title>
</head>

<body>
    <?php include('../navbar.php')?>
    <br>
        
    <?php 
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn,$sql);
        $items = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $qry = "SELECT * FROM item";
        $req = mysqli_query($conn,$qry);
        $res = mysqli_fetch_all($req,MYSQLI_ASSOC);

        $arr = array();
        for($i = 0 ; $i < 10 ; $i++){
            $el = explode(",", $res[$i]["des"]);
            array_push($arr,$el[0]);
        }
    ?> 

    <div class="popular-products">
        <box>
            <h1>สินค้ายอดนิยม</h1>
            <product-header>
                    <div class="card">
                        <a href="<?= $location?>">
                            <item-img><img src="<?php echo $res[0]['pic']?>" alt="รูปสินค้า"></item-img>
                            <item-name><h3><?php echo $res[0]['name']?></h3></item-name>
                            <item-bran><span><?php echo $arr[0]?></span></item-bran>
                        </a>
                    </div>
                    <div class="card">
                        <a href="<?= $location?>">
                            <item-img><img src="<?php echo $res[1]['pic']?>" alt="รูปสินค้า"></item-img>
                            <item-name><h3><?php echo $res[1]['name']?></h3></item-name>
                            <item-bran><span><?php echo $arr[1]?></span></item-bran>
                        </a>
                    </div>
                    <div class="card">
                        <a href="<?= $location?>">
                            <item-img><img src="<?php echo $res[2]['pic']?>" alt="รูปสินค้า"></item-img>
                            <item-name><h3><?php echo $res[2]['name']?></h3></item-name>
                            <item-bran><span><?php echo $arr[2]?></span></item-bran>
                        </a>
                    </div>
                    <div class="card">
                        <a href="<?= $location?>">
                            <item-img><img src="<?php echo $res[3]['pic']?>" alt="รูปสินค้า"></item-img>
                            <item-name><h3><?php echo $res[3]['name']?></h3></item-name>
                            <item-bran><span><?php echo $arr[3]?></span></item-bran>
                        </a>
                    </div>
            </product-header>
            <div class="readmore-btn">
                <button id="readmore-button" onclick="window.location.href='<?= $location?>';">ดูรายการเพิ่มเติม</button>
            </div>
        </box>
    </div>
             
    <div class="con">
        <box>
            <h1 class="i1">สินค้ามากมายเพื่อคุณ</h1>
            <div class="category-collecttion">
                <?php foreach($items as $category) :?>
                    <category-item>
                        <a href="<?= $location?>">
                            <div>
                                <category-img> <img src="<?php echo $category['pic']?>" alt="รูปหมวดหมู่"> </category-img>
                                <category-name> <h3> <?php echo $category['cid']?></h3> </category-name> 
                            </div>
                        </a>
                    </category-item>
                <?php endforeach?>
            </div>
            <hr style="margin-top: 5rem;">

            <div class="why-con">
                <h1>ทำไมต้องเป็น Inventory'S ?</h1>
                <div class="content">
                    <small><i class="fa-solid fa-check"></i> <strong>รวดเร็วที่สุด - </strong>
                    Inventory'S ให้บริการจัดส่งอุปกรณ์ที่รวดเร็วที่สุดในตลาด</small>
                    <small><i class="fa-solid fa-check"></i> <strong>ง่ายที่สุด - </strong>
                    ตอนนี้การยืมของนั้น ง่ายดายเพียงไม่กี่คลิกบนหน้าจอ สามารถทดลองใช้งานอุปกรณ์ที่สนใจในระยะเวลาที่กำหนด</small>
                    <small><i class="fa-solid fa-check"></i> <strong>ราคาถูก - </strong>
                    คุณสามารถยืมอุปกรณ์ที่คุณต้องการ ด้วยราคาเพียง 10% ของสินค้านั้น ทั้งถูกเเละประหยัด</small>
                    <small><i class="fa-solid fa-check"></i> <strong>ความปลอดภัย - </strong>
                    เนื่องจากระบบนี้เป็นระบบ official จึงมีระบบรักษาความปลอดภัยที่จะช่วยให้คุณสามารถใช้งานได้อย่างมีประสิทธิภาพ</small>
                    <small><i class="fa-solid fa-check"></i> <strong>ชำระเงินได้อย่างง่ายดาย - </strong>
                    การจัดส่งของให้คุณเป็นเรื่องง่าย แม้แต่การชำระเงินก็ง่ายและสะดวกมากยิ่งขึ้นด้วยสามารถจ่ายได้ทั้ง เงินสด เเละ QR code</small>
                </div>
            </div>

            <div class="howto">
                <h1>คำถามที่พบบ่อย</h1>
                <div class="title">
                    <h2>Inventory'S คืออะไร?</h2>
                    <small>
                        Inventory'S เป็นบริการจัดการ การยืมอุปกรณ์ที่สนใจ เราได้จัดเตรียมอุปกรณ์มากมายที่คุณต้องการใช้งาน เพื่อช่วยเหลือผู้ที่ต้องการใช้งานสิ่งนั้นเเต่ขาดงบประมาณในการซื้อเเละต้องการใช้ในเวลาจำกัด <br>
                        ด้วยวิธีการที่ง่ายเเละรวดเร็วที่สุดเท่าที่จะเป็นไปได้ค้นหาและเลือกสินค้าที่คุณชื่นชอบได้จากทั่วทั้งประเทศไทย คุณสามารถค้นหาและทดลองใช้งานอุปกรณ์ที่คุณต้องการ เพียงแค่แตะไม่กี่ครั้งผ่านระบบออนไลน์ <br>
                        ไม่ว่าจะเป็น อุปกรณ์ IT เฟอร์นิเจอร์ อุปกรณ์ทำครัว เสื้อผ้า รองเท้า ของตกเเต่ง อุปกรณ์ก่อสร้าง ทุกอย่างสามารถทดลองใช้งานได้จาก Inventory'S ที่นี้ที่เดียวเท่านั้น!!
                    </small>
                </div>
                <hr>
                <div class="title">
                    <h2>Inventory'S ให้บริการตลอด 24 ชั่วโมงหรือไม่?</h2>
                    <small>
                        Inventory'S เป็นระบบบริการที่เปิดตลอด 24 ชั่วโมง โปรดรับทราบว่าเรานั้นคือพันธมิตรที่จะคอยช่วยเหลือคุณเมื่อคุณขาดหรือต้องการอุปกรณ์ต่างๆ <br> 
                        ในการเรียนการศึกษาหรือในการใช้ชีวิตประจำวัน หากทางระบบมีปัญหาเราจะเเจ้งผ่านทาง Facebook Inventory'S ของเรา 
                    </small>
                </div>
                <hr>
                <div class="title">
                    <h2>Inventory'S รับเงินสดหรือไม่?</h2>
                    <small>
                        แน่นอน เรารับเงินสด! Inventory'S รับการชำระเงินในทุกรูปแบบสำหรับการบริการจัดส่งสินค้า รวมถึงเงินสดในการจัดส่งในประเทศไทย
                    </small>
                </div>
                <hr>
                <div class="title">
                    <h2>หากอุปกรณ์เกิดชำรุดหรือเสียหาย จะทำอย่างไร?</h2>
                    <small>
                        หากอุปกรณ์เกิดชำรุดหรือเสียหาย ในกรณีที่ลูกค้าเป็นผู้ทำให้เกิดความเสียหาย ทางลูกค้าจำเป็นต้องจ่ายค่าเสียหายในราคาครึ่งหนึ่งของสินค้าจากราคาเต็ม <br>
                        ในกรณีที่สินค้าชำรุดก่อนที่จะถึงมือของลูกค้าสามารถทำเรื่องส่งคืนสินค้ากลับไปได้เเละไม่จำเป็นต้องจ่ายค่าเสียหายใดๆ ทางเราจะรีบนำสินค้าชิ้นใหม่จัดส่งไปทันทีให้ทันความต้องการของลูกค้า
                    </small>
                </div>
                <hr>
            </div>
        </box> 
    </div>
   <?php include('../footer.php')?>
    <div class="modal">
        <modal-bg></modal-bg>
        <modal-page>
            <div class="modal-head">
                <h2>My Cart</h2>
                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <br>
            <cartlist>
                <cartlist-item>
                    <cartlist-left>

                    </cartlist-left>
                    <cartlist-right>
                        
                    </cartlist-right>
                </cartlist-item>
            </cartlist>
        </modal-page>
    </div>
</body>
</html>
<script src="../script/cart.js"></script>