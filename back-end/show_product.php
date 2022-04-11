<?php

require_once 'connect.php';
//$sql = "SELECT * FROM products";
$sql = "SELECT * FROM products INNER JOIN catalogs ON products.catalog_id = catalogs.catalog_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT * FROM catalogs";
$stmt = $conn->prepare($sql);
$stmt->execute();
$catalog = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
        margin: 20px 40px;
    }
    </style>
    <title>Show products</title>
</head>

<body>
    <div class="product__info">
        <div class="title__product text-center text-danger ">
            <h3 style="font-size:50px">LIST PRODUCTS</h3>
        </div>
        <div class="add_product d-flex justify-content-end my-3">
            <a href="add_product.php" class="btn btn-success" style="width:150px">Add</a>
        </div>
        <div class="info__product">
            <table class="table table-bordered text-center">
                <tr class="table-success">
                    <th>ID</th>
                    <th>Product_Code</th>
                    <th>Product_Name</th>
                    <th>Product_Content</th>
                    <th>Product_Price</th>
                    <th>Product_Quantity</th>
                    <th>Product_Images</th>
                    <th>Product_Created_Date</th>
                    <th>Catalog_Name</th>
                    <th class="text-center">Actions</th>
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
                    <td class="text-center ">
                        <a href="update_product.php?product_id=<?= $value['product_id'] ?>"
                            class="btn btn-primary me-1">Update</a>
                        <a href="delete_product.php?product_id=<?= $value['product_id'] ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>