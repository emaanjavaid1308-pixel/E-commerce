<?php
session_start();
include 'includes/db.php';

$name = $_POST['customer_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
{
    $ids = implode(",", array_keys($_SESSION['cart']));

    $result = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");

    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $qty = $_SESSION['cart'][$id];

        $total += $row['price'] * $qty;
    }
}

// save order
mysqli_query($conn, "INSERT INTO orders (customer_name, phone, address, total_price)
VALUES ('$name', '$phone', '$address', '$total')");

// clear cart
unset($_SESSION['cart']);

header("Location: success.php");
exit();
?>