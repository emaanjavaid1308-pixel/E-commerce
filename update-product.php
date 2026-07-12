<?php
include '../includes/db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];

if($_FILES['image']['name'] != ""){

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "uploads/".$image);

    $sql = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";

} else {

    $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
}

mysqli_query($conn, $sql);

header("Location: view-products.php");
?>