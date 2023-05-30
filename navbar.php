<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<nav class="navbar">
    <div class="containner">
        <ul>
            <a href=""><img src="asset/image/icon.png" alt="รูปไอคอน"></li></a>
            <li class="nav-icon"> <button onclick="window.location.href='<?= $location?>';">Inventory'S</button> </li>
            <li class="nav-item"> <button onclick="window.location.href='<?= $location?>';">Home</button> </li>
            <li class="nav-item"> <button onclick="window.location.href='<?= $location?>';">About</button> </li>

            <?php if(!isset($_SESSION['username'])) :?>
                <li class="nav-item"> <button onclick="window.location.href='<?= $location?>';">Login/Register</button> </li>
            <?php else :?>
                <?php if($_SESSION['role'] == 'user') : ?>
                    <li class="nav-item"> <button onclick="window.location.href='seller/sellerRegister.php';">Start Selling</button> </li>
                <?php else : ?>
                    <li class="nav-item"> <button onclick="window.location.href='seller/';">My Shop</button> </li>
                <?php endif ?>
                <li class="nav-item"> <button onclick="window.location.href='index.php?logout';">Log Out</button> </li>
            <?php endif?>
        </ul>

        <form>
            <input type="search" placeholder="Search" name="search">
            <button type="submit" class="search-btn">Search</button>
            <button id="basket-btn"><i class="fa-solid fa-basket-shopping"></i></button>
        </form>
    </div>
</nav>