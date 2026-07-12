<?php
include 'includes/db.php';

$cat_id = "";

if(isset($_GET['category'])){
    $cat_id = $_GET['category'];

    $query = "SELECT p.*, c.category_name 
              FROM products p
              LEFT JOIN categories c ON p.category_id = c.id
              WHERE p.category_id='$cat_id'";
} else {
    $query = "SELECT p.*, c.category_name 
              FROM products p
              LEFT JOIN categories c ON p.category_id = c.id";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <link rel="stylesheet" href="../style.css">

</head>
<body>

<h2>Products</h2>

<div class="product-container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="product-card">

    <img src="images/<?php echo $row['image']; ?>">

    <h3><?php echo $row['name']; ?></h3>

    <p>Rs <?php echo $row['price']; ?></p>

    <small><?php echo $row['category_name']; ?></small>

</div>

<?php } ?>

</div>
</body>