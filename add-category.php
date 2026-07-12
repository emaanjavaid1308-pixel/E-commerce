<?php
include '../includes/db.php';

if(isset($_POST['add_category']))
{
    $category = $_POST['category_name'];

    mysqli_query($conn, "INSERT INTO categories(category_name)
    VALUES('$category')");

    echo "<script>alert('Category Added Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Add Category</h2>

<form method="POST">
    <input type="text" name="category_name"
           placeholder="Category Name" required>

    <button type="submit" name="add_category">
        Add Category
    </button>
</form>

</body>
</html>