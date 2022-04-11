<?php

session_start();
require_once 'connect.php';
include 'admin_sign_in.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Site management</title>
    <style>
    .btn-danger,
    .btn-success {
        width: 150px;

    }

    th {
        font-size: 30px;
    }
    </style>
</head>

<body>
    <div class="sign__up d-flex justify-content-end p-3">
        <?php if (isset($_SESSION['user_name'])) : ?>
        <div>
            Tài khoản: <?= $_SESSION['user_name'] ?>
            <a href="sign_up.php">Sign out</a>
        </div>
        <?php endif ?>

        <?php if (isset($_GET['message'])) : ?>
        <div>
            <?= $_GET['message'] ?>
        </div>
        <?php endif ?>
    </div>
    <div class=" website__product p-3">
        <table class="table table-bordered">
            <tr class="table-info text-center">
                <th>USER</th>
                <th>PRODUCTS</th>
                <th>CATALOGS</th>
            </tr>
            <tr class="table-warning text-center">
                <td class="p-3">
                    <a class="btn btn-success" href="./show_user.php">List User</a>
                    <a class="btn btn-success" href="./search_user.php">Search User</a>
                </td>
                <td class="p-3">
                    <a class="btn btn-success" href="./show_product.php">List Products</a>
                    <a class="btn btn-success" href="./add_product.php">Add Products</a>
                    <a class="btn btn-success" href="./search_catalog_name.php">Search Producs</a>
                </td>
                <td class="p-3">
                    <a class="btn btn-success" href="./show_catalog.php">List Catalogs</a>
                    <a class="btn btn-success" href="./add_catalog.php">Add Catalogs</a>
                    <a class="btn btn-success" href="./search_catalog.php">Search Catalogs</a>
                </td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>