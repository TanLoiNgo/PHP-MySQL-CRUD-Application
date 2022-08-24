<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Minh Thanh Duong" content="author">
    <title>THE GOOD MART | PHP GROUP ASSIGNMENT</title>
    <link rel="icon" href="./assets/img/mini-logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- !CSS -->

    <!-- AOS CSS effect -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- !AOS CSS effect -->
</head>
<body>

    <nav id="nav">

        <div id="left-nav">
            <div>
                <img src="./assets/img/mini-logo.png" alt="logo-white">
                <a href="./dash-board.php" id="logo">GOODMART</a>
            </div>
            <div id="left-menu">
                <ul>
                    <li>
                        <a href="./dash-board.php" id="home-nav">Dashboard</a>
                    </li>
                    <li>
                        <a href="./view-item-admin.php?cat-id=all" id="item-nav">Items</a>
                    </li>
                    <li class="dropdown">
                        <a href="#">Categories</a>
                        <img src="./assets/img/downArrow.svg" alt="downArrowWhite" class="arrow yello">
                        <div class="dropdown-content">
                        <?php foreach($categoryList as $category){?>

                            <a href="./view-item-admin.php?cat-id=<?php echo $category["cat_id"];?>"><?php echo $category["name"];?></a>

                        <?php };?>

                        </div>
                    </li>
                    <li>
                        <a href="./search-admin.php" id="search-nav">Search</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="right-nav">
            <img src="./assets/img/login-white.svg" alt="login" >
            <a href="./account.php">Account</a>
            <a href="./php/logout.php">Log out</a>
        </div>
        <div id="burger-nav">
            <img src="./assets/img/burger.svg" alt="burger" >
        </div>
        <div id="sub-nav">
            <ul>
                <li>
                    <a href="./dash-board.php" id="home-nav">Dashboard</a>
                </li>
                <li>
                    <a href="./view-item-admin?cat-name=all.php" id="item-nav">Items</a>
                </li>
                <li class="dropdown">
                    <a href="./category-admin.php" id="category-nav">Categories</a>
                    <img src="./assets/img/downArrow.svg" alt="downArrowWhite" class="arrow yello">
                    <div class="dropdown-content">

                    <?php foreach($categoryList as $category){?>

                        <a href="./view-item-admin.php?cat-id=<?php echo $category["cat_id"];?>"><?php echo $category["name"];?></a>

                    <?php };?>

                    </div>
                </li>
                <li>
                    <a href="./search-admin.php" id="search-nav">Search</a>
                </li>
                <li>
                    <a href="./php/logout.php">Log out</a>
                </li>
                <li>
                    <a id="ExitBtn" href="#">Exit </a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="title-assign"><p>PHP Assignment 1 | Advanced Web Programming Comp1230</p></div>
