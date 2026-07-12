<?php

include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM categories WHERE id='$id'";

if(mysqli_query($conn,$sql)){

    header("Location: view-categories.php");
}
    exit();
?>