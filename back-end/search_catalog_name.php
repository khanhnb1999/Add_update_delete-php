<?php

require_once 'connect.php';
//$sql = "SELECT * FROM products";
$sql = "SELECT * FROM products INNER JOIN catalogs ON products.catalog_id = catalogs.catalog_id";

if(isset($_POST['btn_submit'])) {
    $catalog_name = $_POST['catalog_name'];
    if(empty($catalog_name) || strlen($catalog_name) > 100) {
        $message['catalog_name'] = "Bạn phải nhập tên để tìm kiếm";
    } else {
        $sql = "SELECT * FROM products INNER JOIN catalogs ON products.catalog_id = catalogs.catalog_id
        WHERE catalogs.catalog_name LIKE '%$catalog_name%'";
    }
}


$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    .product__info {
        width: auto;
        height: auto;
        margin: 20px 50px;
    }

    .tab__login {
        margin: 20px 50px;
        width: 500px;
        height: auto;
        background-color: #ffffff;
        padding: 10px 22px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .tab__login--title h4 {
        color: red;
        padding: 12px;
        font-size: 35px;
    }

    .login {
        width: 100%;
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
    </style>
    <title>Show products</title>
</head>

<body>
    <div class="">
        <div class="session">
            <div class="tab__login">
                <div class="tab__login--title ">
                    <h4>Search product name</h4>
                </div>
                <form action="search_catalog_name.php" method="post" class="d-flex align-items-center ">
                    <div class="login">
                        <input type="text" name="catalog_name" class="form-control" placeholder="Catalog name">
                    </div>
                    <div class="login login__form--submit ">
                        <button type="submit" name="btn_submit" class="btn btn-primary mx-3">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="product__info">
            <div class="title__product text-center my-3 text-danger ">
                <h3 style="font-size:50px">LIST PRODUCTS</h3>
            </div>
            <div class="info__product">
                <table class="table table-bordered">
                    <tr class="table-success">
                        <th>Product_ID</th>
                        <th>Product_Code</th>
                        <th>Product_Name</th>
                        <th>Product_Content</th>
                        <th>Product_Price</th>
                        <th>Product_Quantity</th>
                        <th>Product_Images</th>
                        <th>Product_Created_Date</th>
                        <th>Catalog_Name</th>
                    </tr>
                    <?php foreach ($product as $value) : ?>
                    <tr class="table-primary text-center">
                        <td><?=$value['product_id']?></td>
                        <td><?=$value['product_code']?></td>
                        <td><?=$value['product_name']?></td>
                        <td><?=$value['product_content']?></td>
                        <td><?=$value['product_price']?></td>
                        <td><?=$value['product_quantity']?></td>
                        <td>
                            <img src="img/<?= $value['product_images'] ?>" width="50px" alt="">
                        </td>
                        <td><?=$value['product_created_date']?></td>
                        <td><?=$value['catalog_name']?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>