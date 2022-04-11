<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    if(empty($user_email)  || strlen($user_email) >= 50) {
        $message['user_email'] = "Bạn phải nhập email và không quá 50 kí tự";
    }

    //test password
    if(empty($user_password) || strlen($user_password) >= 14) {
        $message['user_password'] = "Bạn phải nhập password và không quá 14 kí tự";
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
        margin: 100px auto;
        width: 600px;
        height: auto;
        border-radius: 5px;
        background-color: #ffffff;
        padding: 20px 42px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .tab__login--title h4 {
        color: red;
        padding: 12px;
        font-size: 35px;
    }

    .login {
        margin-top: 19px;
    }

    .login__label {
        font-size: 20px;
        padding-bottom: 7px;
    }

    .login__account {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .login__form--sign a {
        text-decoration: none;
    }

    .login__form--sign a:hover {
        text-decoration: underline;
    }

    .login__recover {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-danger {
        width: 163px;
    }
    </style>
    <title>Login user</title>
</head>

<body>
    <div class="tab__login">
        <div class="tab__login--title text-center">
            <h4>Sign in</h4>
        </div>
        <form action="sign-in.php" method="post">
            <div class="login ">
                <label for="" class="login__label"><b>Email</b></label>
                <input type="email" name="user_email" class="form-control" placeholder="Email">
                <span style="color:red">
                    <?= isset($message['user_email']) ? $message['user_email'] : "" ?>
                </span>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Password</b></label>
                <input type="text" name="user_password" class="form-control" placeholder="Password">
                <span style="color:red">
                    <?= isset($message['user_password']) ? $message['user_password'] : "" ?>
                </span>
            </div>
            <div class="login__account">
                <div class="login login__form--check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <div class="login login__form--sign">
                    <p>No account? <a href="sign-up.php"> Sign up now</a></p>
                </div>
            </div>
            <div class="login__recover">
                <div class="login login__form--submit">
                    <button type="button" class="btn btn-danger">Recover password</button>
                </div>
                <div class="login login__form--submit">
                    <button type="submit" class="btn btn-success">Sign in</button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>