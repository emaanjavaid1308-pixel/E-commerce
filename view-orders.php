<?php
include '../includes/db.php';

$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");
?>

<style>
body{
    font-family: Arial;
    background:#f4f6f9;
}

.container{
    width:90%;
    margin:30px auto;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0px 0px 10px #ccc;
}

th{
    background:#333;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f1f1;
}

a{
    text-decoration:none;
    padding:5px 10px;
    border-radius:5px;
    color:white;
    margin:2px;
}

a[href*="Shipped"]{
    background:orange;
}

a[href*="Delivered"]{
    background:green;
}

</style>

<div class="container">

<h2>📦 All Orders</h2>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Total</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['total_price']; ?></td>
    <td><?php echo $row['Status']; ?></td>
    <td>
        <a href="update-status.php?id=<?php echo $row['id']; ?>&status=Shipped">Shipped</a>
        <a href="update-status.php?id=<?php echo $row['id']; ?>&status=Delivered">Delivered</a>
    </td>
</tr>

<?php } ?>

</table>

</div>