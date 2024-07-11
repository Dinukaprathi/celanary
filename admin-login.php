<?php
session_start();
include 'conection.php'; 

$error_message = '';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $error_message = "Username and password are required";
    } else {
       
        $sql = "SELECT id, password FROM admin_users WHERE username = ? AND PASSWORD = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] = $row['name'];
            header("Location: admin-dashboard.php");
            exit();
        } else {
            $error_message = "Incorrect username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="admin-login-styles.css">
</head>
<body>
<div class="login-container">
    <h1>Admin</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit" value="Login">

        <?php if($error_message): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    </form>
</div>
    
</body>
</html>

<?php

mysqli_close($conn);
?>
