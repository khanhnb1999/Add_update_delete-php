<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_GET['user_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_address = $_POST['user_address'];

    $sql = "UPDATE users SET
    user_name='$user_name',
    user_email='$user_email',
    user_password='$user_password',
    user_address='$user_address' 
    WHERE user_id='$user_id'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_user.php");
    exit;
}

$user_id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$value = $stmt->fetch(PDO::FETCH_ASSOC);


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
            <h4>Update</h4>
        </div>
        <form action="update_user.php?user_id=<?= $value['user_id'] ?>" method="post">
            <div class="login ">
                <label for="" class="login__label"><b>Username</b></label>
                <input type="text" class="form-control" name="user_name" placeholder="Username"
                    value="<?=$value['user_name']?>">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Email</b></label>
                <input type="email" class="form-control" name="user_email" placeholder="Email"
                    value="<?=$value['user_email']?>">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Password</b></label>
                <input type="password" class="form-control" name="user_password" placeholder="Password"
                    value="<?=$value['user_password']?>">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Address</b></label>
                <input type="address" class="form-control" name="user_address" placeholder="Address"
                    value="<?=$value['user_address']?>">
            </div>
            <div class="login">
                <button type="submit" class="btn btn-success" name="btn_submit">Update User</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>