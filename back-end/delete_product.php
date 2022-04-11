<?php

require_once 'connect.php';
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM products WHERE product_id=$product_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: show_product.php");
    
}

?>