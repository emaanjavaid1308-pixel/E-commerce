<?php
include 'includes/db.php';
session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        if($row['role'] == 'admin'){

    $_SESSION['admin_id'] = $row['id'];
    $_SESSION['admin_name'] = $row['name'];
    $_SESSION['role'] = 'admin';

    header("Location: admin/dashboard.php");
    exit();

}else{

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['role'] = 'user';


    header("Location: index.php");
    exit();

}

    } else {
        $error = "Invalid email or password!";
    }
}
?>
<head>
<link rel="stylesheet" href="style.css">
</head>

<form method="POST">

<h2>User Login</h2>

<input type="email" name="email" placeholder="Email"><br><br>

<input type="password" name="password" placeholder="Password"><br><br>

<button name="login">Login</button>

</form>

<?php if(isset($error)) echo $error; ?>