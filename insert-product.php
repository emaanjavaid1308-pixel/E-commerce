<?php

include '../includes/db.php';

$name = $_POST['name'];
$price = $_POST['price'];

$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, "../images/" . $image);

$sql = "INSERT INTO products(name, price, image)
VALUES('$name', '$price', '$image')";

$result = mysqli_query($conn, $sql);

if($result){

    header("Location: view-products.php");
}else{

    echo "Product Not Added";

}

?>