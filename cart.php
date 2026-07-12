<?php
session_start();
include 'includes/db.php';

$cart = $_SESSION['cart'] ?? [];

echo "<h1 style='text-align:center;'>Cart 🛒</h1>";

$total = 0;

if (empty($cart)) {
    echo "<p style='text-align:center;'>Cart is empty</p>";
    exit();
}

foreach ($cart as $id => $qty) {

    $id = (int)$id;
    $qty = (int)$qty;

    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

    if (!$result || mysqli_num_rows($result) == 0) {
        continue;
    }

    $row = mysqli_fetch_assoc($result);

    $price = (float)($row['price'] ?? 0);
    $name = $row['name'] ?? 'Product';

    $subtotal = $price * $qty;
    $total += $subtotal;
?>

<div style="
    width: 60%;
    margin: 10px auto;
    padding: 15px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
">

    <h3><?php echo $name; ?></h3>
    <p>Price: Rs <?php echo $price; ?></p>
    <p>Qty: <?php echo $qty; ?></p>
    <p><b>Subtotal: Rs <?php echo $subtotal; ?></b></p>
    <a href="decrease.php?id=<?php echo $id; ?>"
   style="padding:5px 10px; background:#f39c12; color:white; text-decoration:none;">
   -
</a>

<a href="increase.php?id=<?php echo $id; ?>"
   style="padding:5px 10px; background:#2ecc71; color:white; text-decoration:none;">
   +
</a>
    <a href="remove-from-cart.php?id=<?php echo $id; ?>"
   style="color:white; background:red; padding:5px 10px; text-decoration:none; border-radius:5px;">
   Remove
</a>

</div>

<?php } ?>

<h2 style="text-align:center;">
    Total: Rs <?php echo $total; ?>
</h2>
<a href="checkout.php">
    <button>Checkout</button>
</a>