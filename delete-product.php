<?php

include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    header("Location: view-products.php");

}else{

    echo "Product Not Deleted";

}

?>