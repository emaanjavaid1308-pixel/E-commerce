<?php
include '../includes/db.php';

if(isset($_POST['add_product']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../images/".$image);

    // insert query
    $query = "INSERT INTO products (name, price, image, category_id)
              VALUES ('$name', '$price', '$image', '$category_id')";

    mysqli_query($conn, $query);

    echo "<script>alert('Product Added Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <link rel="stylesheet" href="../style.css">

</head>
<body>

<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Product Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Price:</label>
    <input type="text" name="price" required><br><br>

    <!-- CATEGORY DROPDOWN -->
    <label>Category:</label>
    <select name="category_id" required>

        <option value="">Select Category</option>

        <?php
        $cats = mysqli_query($conn, "SELECT * FROM categories");

        while($cat = mysqli_fetch_assoc($cats))
        {
        ?>
        <option value="<?php echo $cat['id']; ?>">
            <?php echo $cat['category_name']; ?>
        </option>
        <?php } ?>

    </select>

    <br><br>

    <label>Image:</label>
    <input type="file" name="image" required><br><br>

    <button type="submit" name="add_product">Add Product</button>

</form>
</body>