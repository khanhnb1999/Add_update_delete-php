<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = [];
    //lấy dữ liệu bằng phương thức post
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_confirm_password = $_POST['user_confirm_password'];
    $user_address = $_POST['user_address'];
    $user_type = $_POST['user_type'];

    //test username
    if(empty($user_name)  || strlen($user_name) >= 30) {
        $message['user_name'] = "Bạn phải nhập username và không quá 20 kí tự";
    }

    //test email
    if(empty($user_email)  || strlen($user_email) >= 50) {
        $message['user_email'] = "Bạn phải nhập email và không quá 50 kí tự";
    }

    //test password
    if(empty($user_password) || strlen($user_password) >= 14) {
        $message['user_password'] = "Bạn phải nhập password và không quá 14 kí tự";
    }

    //tes confirm password
    if(empty($user_confirm_password) || strlen($user_confirm_password) >= 14 || $user_confirm_password!=$user_password) {
        $message['user_confirm_password'] = "Mật khẩu bạn nhập không khớp";
    }
    if(empty($user_address) || strlen($user_address) >= 200) {
        $message['user_address'] = "Bạn phải nhập address và không quá 200 kí tự";
    }

    if(empty($message)) {
        $query = "SELECT * FROM users WHERE user_name='$user_name' OR user_email='$user_email'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($user)) {
            $sql = "INSERT INTO users
            (
                user_name,
                user_email,
                user_password,
                user_address,
                user_type
            )
            VALUES
            (
                '$user_name',
                '$user_email',
                '$user_password',
                '$user_address',
                '$user_type'
            )
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        header("Location: show_user.php");
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <style>
    .tab__login {
        margin: 80px auto;
        width: 700px;
        height: auto;
        background-color: #ffffff;
        padding: 20px 42px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .tab__login--title h4 {
        color: red;
        padding: 12px;
        font-size: 35px;
    }

    .login {
        margin-top: 12px;
    }

    .login__label {
        font-size: 20px;
        padding-bottom: 7px;
    }

    .login__sign--up--in {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .login__sign--up p {
        padding-top: 12px;
        margin: 0;
    }

    .login__sign--up a {
        text-decoration: none;
    }

    .btn-success {
        margin-top: 12px;
        width: 100%;
        height: 50px;
    }
    </style>
    <title>Registration</title>
</head>

<body>
    <div class="tab__login">
        <div class="tab__login--title text-center">
            <h4>Sign up</h4>
        </div>
        <form action="sign_up_admin.php" method="post">
            <div class="login ">
                <label for="" class="login__label"><b>Username</b></label>
                <input type="text" class="form-control" name="user_name" placeholder="Username">
                <span style="color:red">
                    <?= isset($message['user_name']) ? $message['user_name'] : "" ?>
                </span>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Email</b></label>
                <input type="email" class="form-control" name="user_email" placeholder="Email">
                <span style="color:red">
                    <?= isset($message['user_email']) ? $message['user_email'] : "" ?>
                </span>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Password</b></label>
                <input type="password" class="form-control" name="user_password" placeholder="Password">
                <span style="color:red">
                    <?= isset($message['user_password']) ? $message['user_password'] : "" ?>
                </span>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Confirm Password</b></label>
                <input type="password" class="form-control" name="user_confirm_password" placeholder="Confirm password">
                <span style="color:red">
                    <?= isset($message['user_confirm_password']) ? $message['user_confirm_password'] : "" ?>
                </span>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Address</b></label>
                <input type="address" class="form-control" name="user_address" placeholder="Address">
                <span style="color:red">
                    <?= isset($message['user_address']) ? $message['user_address'] : "" ?>
                </span>
            </div>
            <div class="login">
                <label for="" class="login_label my-1"><b>User type</b></label>
                <select class="form-select" aria-label="Default select example" name="user_type">
                    <option selected>Open user type</option>
                    <option value="customer">Customer</option>
                    <option value="Admin">Administrator</option>
                </select>
            </div>
            <div class="login__sign--up--in">
                <div class="login login__form--check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Accept our Terms
                    </label>
                </div>
                <div class="login__sign--up">
                    <p>Already have an account? <a href="sign-in.php">Sign in</a> | <a href="forgot-password.php">Forgot
                            password</a>
                    </p>
                </div>
            </div>
            <div class="login">
                <button type="submit" class="btn btn-success" name="btn_submit">Create Account</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>