<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="./assets/css/forgot-password.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/sign-in.css">
    <link rel="stylesheet" href="./assets/css/sign-up.css">
    <link rel="stylesheet" href="./assets/css/details.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <title>Home</title>
</head>

<body>
    <header class="header">
        <div class="header__top">
            <div class="container header__top--web">
                <div class="header__top--logo">
                    <a href=""><img src="/img/logo.png" alt=""></a>
                </div>
                <div class="header__top--search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                        <button class="btn btn-search" type="button">Search</button>
                    </div>
                </div>
                <div class="header__top--shop--car">
                    <a href=""><i class="fas fa-cart-arrow-down"></i></a>
                </div>
            </div>
        </div>
        <!-- end header top  -->
        <div class="menu__header">
            <div class="container menu__header--product">
                <div class="menu__header--top">
                    <ul class="menu__header--item">
                        <li class="menu__header--item--title">
                            <a href="/front-end/home.php" class="menu__header--link">Home</a>
                        </li>
                        <li class="menu__header--item--title">
                            <a href="/front-end/details.php" class="menu__header--link">Chi tiết</a>
                        </li>
                        <li class="menu__header--item--title">
                            <a href="/front-end//product.php" class="menu__header--link">Sản phẩm</a>
                        </li>
                        <li class="menu__header--item--title">
                            <a href="/front-end/contact.php" class="menu__header--link">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="menu__header--contact">
                    <div class="menu__header--icon">
                        <a href="/front-end/sign-up.php">Đăng kí</i></a>
                        <div class="menu__header--icon--login"></div>
                    </div>
                    <div class="menu__header--login">
                        <a href="/front-end/sign-in.php">Đăng nhập</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container banner__web">
            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/banner1.jpg" alt="Banner1" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/banner2.jpg" alt="Banner2" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </header>