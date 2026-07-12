<?php
include 'includes/db.php';
?>

<style>
body{
    font-family: Arial;
    background:#f2f2f2;
}

.form-box{
    width: 350px;
    background:white;
    padding:20px;
    margin:50px auto;
    border-radius:10px;
    box-shadow:0px 0px 10px #ccc;
}

input, textarea{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:10px;
    background:green;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:darkgreen;
}
</style>

<div class="form-box">

<h2>Checkout</h2>

<form action="place-order.php" method="POST">

Name:
<input type="text" name="customer_name" required>

Phone:
<input type="text" name="phone" required>

Address:
<textarea name="address" required></textarea>

<button type="submit">Place Order</button>

</form>

</div>