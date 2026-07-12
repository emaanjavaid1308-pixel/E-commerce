<?php
include 'includes/db.php';

if(isset($_POST['email']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "INSERT INTO subscribers (email) VALUES ('$email')";

    if(mysqli_query($conn, $query))
    {
        echo "<script>
        alert('Subscribed Successfully!');
        window.location.href='index.php';
        </script>";
    }
    else
    {
        echo "Error!";
    }
}
?>