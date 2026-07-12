<?php
include '../includes/db.php';

if(!isset($_GET['id']) || $_GET['id'] == ""){
    die("ID missing");
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM categories WHERE id='$id'");

if(mysqli_num_rows($result) == 0){
    die("Category not found");
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name = $_POST['name'];

    mysqli_query($conn, "UPDATE categories SET category_name='$name' WHERE id='$id'");

    header("Location: view-categories.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Category</title>

<style>
body{
    font-family:Arial;
    background:#f4f6f9;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    background:white;
    padding:25px;
    border-radius:10px;
    width:300px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

input{
    width:100%;
    padding:10px;
    margin-top:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

button{
    margin-top:15px;
    width:100%;
    padding:10px;
    border:none;
    background:#3498db;
    color:white;
    border-radius:6px;
}
</style>

</head>

<body>

<div class="box">
    <h2>Edit Category</h2>

    <form method="POST">
        <input type="text" name="name"
        value="<?php echo $row['category_name']; ?>">

        <button name="update">Update</button>
    </form>
</div>

</body>
</html>