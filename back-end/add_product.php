<?php
require_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_content = $_POST['product_content'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_images = "no_images.jpg";
    $product_created_date = $_POST['product_created_date'];
    $product_update_date = $_POST['product_update_date'];
    $catalog_name = $_POST['catalog_name'];
    if($_FILES['fileToUpload']['size'] > 0) {
        $product_images = $_FILES['fileToUpload']['name'];
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'img/' . $product_images);
    }

    $sql = "INSERT INTO products
    (
        product_code,
        product_name,
        product_content,
        product_price,
        product_quantity,
        product_images,
        product_created_date,
        product_update_date,
        catalog_id
    )
    VALUES 
    (
        '$product_code',
        '$product_name',
        '$product_content',
        '$product_price',
        '$product_quantity',
        '$product_images',
        '$product_created_date',
        '$product_update_date',
        '$catalog_name'
    )
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_product.php");
    exit;
}

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
            <h4>Thêm sản phẩm</h4>
        </div>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
            <div class="login">
                <label for="" class="login__label"><b>Nhập mã sản phẩm</b></label>
                <input type="text" name="product_code" class="form-control" placeholder="Nhập mã sản phẩm">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Nhập tên sản phẩm</b></label>
                <input type="text" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="mb-3 mt-3">
                <label for="comment"><b>Comments:</b></label>
                <textarea class="form-control" rows="2" name="product_content"></textarea>
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Nhập giá sản phẩm</b></label>
                <input type="text" name="product_price" class="form-control" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Nhập số lượng sản phẩm</b></label>
                <input type="number" name="product_quantity" class="form-control" placeholder="Nhập số lượng sản phẩm">
            </div>
            <div class="my-3">
                <label for="formFile" class="form-label"><b>Chọn ảnh sản phẩm</b></label>
                <input class="form-control" type="file" id="formFile" name="fileToUpload">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Ngày nhập</b></label>
                <input type="date" name="product_created_date" class="form-control" placeholder="Ngày nhập">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Ngày xuất</b></label>
                <input type="date" name="product_update_date" class="form-control" placeholder="Ngày xuất">
            </div>
            <div class="login ">
                <label for="" class="login__label"><b>Catalog</b></label>
                <select name="catalog_name" class="form-control">
                    <option>Select catalog</option>
                    <?php foreach($catalog as $cat): ?>
                    <option value="<?php echo $cat['catalog_id']; ?>">
                        <?php echo $cat['catalog_name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="login ">
                <button type="submit" class="btn btn-danger" name="btn_submit">Add product</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>