<?php
 require_once 'connect.php';
 
 if(isset($_GET['catalog_id'])) {
     $catalog_id = $_GET['catalog_id'];
     $sql = "DELETE FROM catalogs WHERE catalog_id='$catalog_id'";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     header("Location: show_catalog.php");
 }



?>