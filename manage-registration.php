<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Manage_registration_styles.css">
<body>
    
</body>
</html>
<?php

include 'conection.php';

$sql = "SELECT * FROM admin_users";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>User Type</th><th>Password</th><th>Action</th></tr>";
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        
        echo "<td><a href='update_registration.php?id=" . $row['id'] . "'>Update</a> | <a href='Delete_registration.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
