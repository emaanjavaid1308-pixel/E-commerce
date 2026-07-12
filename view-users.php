<?php
include '../includes/db.php';

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<h2> All Users</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['role'] ?></td>
</tr>

<?php } ?>
</table>
