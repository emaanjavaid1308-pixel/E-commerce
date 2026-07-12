<?php
include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Categories</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

/* LAYOUT */
body{
    display:flex;
    background:#f4f6f9;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    height:100vh;
    background:#111;
    color:white;
    padding:20px;
    position:fixed;
}

.sidebar h2{
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:10px;
    margin-bottom:10px;
    border-radius:6px;
}

.sidebar a:hover{
    background:#ff4d4d;
}

/* MAIN */
.main{
    margin-left:220px;
    width:100%;
}

/* TOP BAR */
.topbar{
    background:white;
    padding:15px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.topbar h3{
    color:#333;
}

.topbar a{
    background:#ff4d4d;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:6px;
}

/* SEARCH */
.search-box{
    padding:20px;
}

.search-box input{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

/* GRID */
.container{
    padding:20px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

/* CARD */
.card{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

/* BUTTONS */
.btn{
    display:inline-block;
    margin-top:10px;
    padding:7px 10px;
    border-radius:6px;
    text-decoration:none;
    font-size:13px;
}

.edit{
    background:#3498db;
    color:white;
}

.delete{
    background:#e74c3c;
    color:white;
}

.edit:hover{background:#217dbb;}
.delete:hover{background:darkred;}

/* EMPTY */
.empty{
    text-align:center;
    padding:40px;
    color:gray;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="../index.php">Dashboard</a>
    <a href="view-categories.php">Categories</a>
    <a href="view-products.php">Products</a>
    <a href="../logout.php">Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <h3>📂 Categories</h3>
        <a href="add-category.php">+ Add Category</a>
    </div>

    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" placeholder="Search categories...">
    </div>

    <!-- DATA -->
    <div class="container">

    <?php
    $result = mysqli_query($conn, "SELECT * FROM categories");

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
    ?>

        <div class="card">
            <h3><?php echo $row['category_name']; ?></h3>

            <a class="btn edit" href="edit-category.php?id=<?php echo $row['id']; ?>">Edit</a>

            <a class="btn delete"
               href="delete-category.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Delete this category?')">
               Delete
            </a>
        </div>

    <?php
        }

    }else{
        echo "<div class='empty'>No categories found 😕</div>";
    }
    ?>

    </div>

</div>

</body>
</html>