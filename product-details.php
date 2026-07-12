<?php
include 'includes/db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Detail</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<<div class="product-card">

    <img src="images/<?php echo $product['image']; ?>">

    <div class="product-content">

        <h1><?php echo $product['name']; ?></h1>

        <h2>Rs. <?php echo $product['price']; ?></h2>

        <p>High quality product available in store.</p>

        <button>Add to Cart</button>

        <br><br>

        <a href="index.php">← Back</a>

    </div>

</div>

</body>
</html>