<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Minh Thanh Duong" content="author">
    <title>THE GOOD MART | PHP GROUP ASSIGNMENT</title>
    <link rel="icon" href="./assets/img/mini-logo.png">
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
                <a href="./index.php" id="logo">GOODMART</a>
            </div>
            <div id="left-menu">
                <ul>
                    <li>
                        <a href="./index.php" id="home-nav">Home</a>
                    </li>
                    <li>
                        <a href="./view-item.php?cat-id=all" id="item-nav">Items</a>
                    </li>
                    <li class="dropdown" id="category-nav">
                        <a href="#">Categories</a>
                        <img src="./assets/img/downArrow.svg" alt="downArrowWhite" class="arrow yello">
                        <div class="dropdown-content">
                        <?php foreach($categoryList as $category){?>
                            <?php if($category['status'] == 'SHOW'){?>
                            <a href="./view-item.php?cat-id=<?php echo $category["cat_id"];?>"><?php echo $category["name"];?></a>
                            <?php } ?>
                            <?php };?>
                        </div>
                    </li>
                    <li>
                        <a href="./search.php" id="search-nav">Search</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="right-nav">
            <img src="./assets/img/login-white.svg" alt="login" >
            <a id="loginBtn1" href="./login.html">Login</a>
        </div>
        <div id="burger-nav">
            <img src="./assets/img/burger.svg" alt="burger" >
        </div>

        <div id="sub-nav">
            <ul>
                <li>
                    <a href="./index.php" id="home-nav">Home</a>
                </li>
                <li>
                    <a href="./view-item?cat-id=all" id="item-nav">Items</a>
                </li>
                <li class="dropdown">
                    <a href="#" id="category-nav">Categories</a>
                    <img src="./assets/img/downArrow.svg" alt="downArrowWhite" class="arrow yello">
                    <div class="dropdown-content">

                    <?php foreach($categoryList as $category){?>
                        <?php if($category['status'] == 'SHOW'){?>
                            <a href="./view-item.php?cat-id=<?php echo $category["id"];?>"><?php echo $category["name"];?></a>
                        <?php } ?>
                    <?php };?>

                    </div>
                </li>
                <li>
                    <a href="./search.php" id="search-nav">Search</a>
                </li>
                <li>
                    <a id="loginBtn2" href="#">Login</a>
                </li>
                <li>
                    <a id="ExitBtn" href="#">Exit </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="title-assign"><p>PHP Assignment 1 | Advanced Web Programming Comp1230</p></div>
