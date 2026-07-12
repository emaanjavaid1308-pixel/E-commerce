<?php
include '../includes/db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
    margin:0;
    padding:0;
}

.container{
    width:400px;
    margin:50px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    font-weight:bold;
}

input[type="text"],
input[type="file"]{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

img{
    display:block;
    margin:10px auto;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:darkgreen;
}

</style>

</head>
<body>

<div class="container">

<h2>Edit Product</h2>

<form action="update-product.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<label>Product Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>">

<label>Price</label>
<input type="text" name="price" value="<?php echo $row['price']; ?>">

<label>Change Image</label>
<input type="file" name="image">

<img src="../images/<?php echo $row['image']; ?>" width="100">

<button type="submit">Update Product</button>

</form>

</div>

</body>
</html>