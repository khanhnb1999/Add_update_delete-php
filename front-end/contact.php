<?php include './layouts/header.php' ?>

<div class="container main__contents my-3">
    <div class="row main__content--user">
        <div class="col-sm-6">
            <img src="./assets/img/shope.PNG" alt="">
        </div>
        <div class="col-sm-6 contact__login">
            <div class="contact__login--title p-1">
                <div class="contact__login--title--status">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="contact__login--icon">
                    <img src="./assets/img/code.jpg" alt="">
                </div>
            </div>
            <!-- end status login -->
            <div class="main__content--input">
                <input type="text" class="form-control" placeholder="Email/Số điện thoại/Tên đăng nhập">
                <input type="text" class="form-control" placeholder="Password">
                <button type="button" class="btn btn-danger">Đăng nhập</button>
            </div>
            <!-- end main__content input -->
            <div class="main__content--password">
                <div class="main__content--password--foget">
                    <p>Quên mật khẩu</p>
                </div>
                <div class="main__content--password--sms">
                    <p>Đăng nhập với SMS</p>
                </div>
            </div>
            <!-- end main__content password -->
            <div class="main__content--or">
                <h4>HOẶC</h4>
                <div class="main__content--border"></div>
                <div class="main__content--borders"></div>
            </div>
            <!-- end main__content or -->
            <div class="main__content--app">
                <div class="main__content--app--face">
                    <div class="main__content--app--face--icon">
                        <a href=""><i class="fab fa-facebook"></i></a>
                    </div>
                    <div class="main__content--app--face--title">
                        <p>Facebook</p>
                    </div>
                </div>
                <div class="main__content--app--face">
                    <div class="main__content--app--google--icon">
                        <a href=""><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <div class="main__content--app--face--title">
                        <p>Google</p>
                    </div>
                </div>
                <div class="main__content--app--face">
                    <div class="main__content--app--apple--icon">
                        <a href=""><i class="fab fa-apple"></i></a>
                    </div>
                    <div class="main__content--app--face--title">
                        <p>Apple</p>
                    </div>
                </div>
            </div>
            <div class="main__content--new">
                <p>Bạn mới biết đến Shope?<span>Đăng kí</span></p>
            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footer.php' ?>