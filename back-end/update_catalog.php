<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catalog_id = $_GET['catalog_id'];
    $catalog_name = $_POST['catalog_name'];

    
    $sql = "UPDATE catalogs SET
    catalog_name='$catalog_name'
    WHERE catalog_id='$catalog_id'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_catalog.php");
    exit;
}

$catalog_id = $_GET['catalog_id'];
$sql = "SELECT * FROM catalogs WHERE catalog_id='$catalog_id'";
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
            <h4>Update catalog</h4>
        </div>
        <form action="update_catalog.php?catalog_id=<?= $value['catalog_id'] ?>" method="post">
            <div class="login ">
                <label for="" class="login__label"><b>Username</b></label>
                <input type="text" class="form-control" name="catalog_name" placeholder="Catalog name"
                    value="<?=$value['catalog_name']?>">
            </div>
            <div class="login">
                <button type="submit" class="btn btn-success" name="btn_submit">Update catalog</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>