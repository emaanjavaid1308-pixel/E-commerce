<?php
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>

    <link rel="stylesheet" href="style.css">

    <style>

        table{
            width: 90%;
            margin: 50px auto;
            border-collapse: collapse;
        }

        table th, table td{
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
        }

        img{
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .btn {
    padding: 6px 12px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    font-size: 14px;
    margin-right: 5px;
    display: inline-block;
}

.edit {
    background-color: green;
}

.delete {
    background-color: red;
}

.edit:hover {
    background-color: darkgreen;
}

.delete:hover {
    background-color: darkred;
}

    </style>

</head>
<body>

<h2 style="text-align:center; margin-top:20px;">
    All Products
</h2>

<table>

    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Delete</th>
    </tr>

    <?php

    $sql = "SELECT * FROM products";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

    ?>

    <tr>

        <td><?php echo $row['id']; ?></td>

        <td>
            <img src="../images/<?php echo $row['image']; ?>">
        </td>

        <td><?php echo $row['name']; ?></td>

        <td>Rs <?php echo $row['price']; ?></td>

       <td>
    <a class="btn edit" href="edit-product.php?id=<?php echo $row['id']; ?>">Edit</a>

    <a class="btn delete" href="delete-product.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

    </tr>

    <?php } ?>

</table>

</body>
</html>