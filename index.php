<?php
session_start();
if (!isset($_SESSION['u_email'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home page</title>
</head>
<body>
    <div class="container">
        <h1><?php echo "hi, " . $_SESSION['u_name']; ?></h1>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <a href="changepass.php" class="btn btn-danger">Change Password</a>
    </div>
</body>
</html>