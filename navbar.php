<link rel="stylesheet" href="../test.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<nav class="navbar">
    <div class="containner">
        <ul>
            <img src="https://cdn.discordapp.com/attachments/856855218427265024/1113147353902362686/icon.png" alt="รูปไอคอน"></li>
            <li class="nav-icon">Inventory'S</li>
            <?php if(!isset($_SESSION['username'])) :?>
                <li class="nav-item"> <button onclick="window.location.href='<?= $location?>';">Home</button> </li>
                <li class="nav-item"> <button onclick="window.location.href='<?= $location?>';">About</button> </li>
            <?php else :?>
                <?php if($_SESSION['role'] == 'user') : ?>
                    <li class="nav-item"> <button onclick="window.location.href='sellerRegister.php';">Start Selling</button> </li>
                    <li class="nav-item"> <button>Home</button> </li>
                    <li class="nav-item"> <button>About</button> </li>
                <?php else : ?>
                    <li class="nav-item"> <button onclick="window.location.href='sellerHome.php';">My Shop</button> </li>
                    <li class="nav-item"> <button>Home</button> </li>
                    <li class="nav-item"> <button>About</button> </li>
                <?php endif ?>
            <?php endif?>
        </ul>

        <section>
            <button id="basket-btn"><i class="fa-solid fa-basket-shopping"></i></button>
            <?php if(!isset($_SESSION['username'])) :?>
                <button onclick="window.location.href='login.php'">Login/Register</button>
            <?php else :?>
                <button onclick="window.location.href='index.php?logout';">Log Out</button>
            <?php endif?>
        </section>
    </div>
</nav>
