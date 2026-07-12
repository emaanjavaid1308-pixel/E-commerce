<?php
include 'includes/db.php';

if(isset($_POST['register'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$role = "user";

$sql = "INSERT INTO users(name,email,password,role)
VALUES('$name','$email','$password','$role')";

mysqli_query($conn,$sql);

header("Location: admin/dashboard.php");
exit();

}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<form method="POST">

<h2>User Register</h2>

<input type="text" name="name" placeholder="Name" required>
<br><br>

<input type="email" name="email" placeholder="Email" required>
<br><br>

<input type="password" name="password" placeholder="Password" required>
<br><br>

<button type="submit" name="register">
Register
</button>

</form>

</body>
</html>