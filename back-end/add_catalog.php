<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catalog_name = $_POST['catalog_name'];

    $sql = "INSERT INTO catalogs
    (
        catalog_name
    )
    VALUES 
    (
        '$catalog_name'
    )
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_catalog.php");
    exit;
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
        margin: 50px auto;
        width: 700px;
        height: auto;
        background-color: #ffffff;
        padding: 30px 52px;
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
        justify-content: space-between;
        align-items: center;
    }

    .login__sign--up p {
        padding-top: 12px;
        margin: 0;
    }

    .login__sign--up a {
        text-decoration: none;
    }

    .btn-danger {
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
            <h4>Thêm danh mục sản phẩm</h4>
        </div>
        <form action="add_catalog.php" method="post" enctype="multipart/form-data">
            <div class="login">
                <label for="" class="login__label"><b>Nhập mã sản phẩm</b></label>
                <input type="text" name="catalog_name" class="form-control" placeholder="Nhập tên danh mục">
            </div>
            <div class="login ">
                <button type="submit" class="btn btn-primary" name="btn_submit">Add catalog</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>