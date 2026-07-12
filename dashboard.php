<?php
session_start();

// if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
//     header("Location: ../login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="dashboard">

    <h1>Admin Dashboard</h1>

    <div class="dashboard-grid">

        <a href="add-product.php" class="card">
            <i class='bx bx-plus-circle'></i>
            <h3>Add Products</h3>
        </a>

        <a href="view-products.php" class="card">
            <i class='bx bx-package'></i>
            <h3>View Products</h3>
        </a>

        <a href="view-orders.php" class="card">
            <i class='bx bx-cart'></i>
            <h3>View Orders</h3>
        </a>

        <a href="add-category.php" class="card">
            <i class='bx bx-category'></i>
            <h3>Add Category</h3>
        </a>

        <a href="view-categories.php" class="card">
            <i class='bx bx-list-ul'></i>
            <h3>View Categories</h3>
        </a>

    </div>

</div>

</body>
</html>