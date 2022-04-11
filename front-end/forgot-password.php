<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    if(empty($user_email)  || strlen($user_email) >= 30) {
        $message['user_email'] = "Bạn phải nhập email và không quá 30 kí tự";
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
        width: 600px;
        height: auto;
        background-color: #ffffff;
        padding: 20px 42px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .form-control {
        height: 50px;
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
        padding-bottom: 12px;
    }

    .login__account {
        margin-top: 20px;
    }

    .login__account a {
        text-decoration: none;
    }

    .btn-success {
        width: 100%;
        height: 50px;
    }
    </style>
    <title>Registration</title>
</head>

<body>
    <div class="tab__login">
        <div class="tab__login--title text-center">
            <h4>Fogot password</h4>
        </div>
        <form action="forgot-password.php" method="post">
            <div class="login login__form--email">
                <label for="" class="login__label"><b>Email</b></label>
                <input type="email" name="user_email" class="form-control" placeholder="Email...">
                <span style="color:red">
                    <?= isset($message['user_email']) ? $message['user_email'] : "" ?>
                </span>
            </div>
            <div class="login__account">
                <a href="sign-up.php">Sign in existing account</a>
            </div>
            <div class="login login__form--submit">
                <button type="submit" class="btn btn-success">Sign up</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>