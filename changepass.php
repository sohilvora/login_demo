<?php
session_start();
require("dbconnect.php");
if (!isset($_SESSION['u_email'])) {
    echo "<script>alert('Login Required');window.location='login.php';</script>";
}
if ($_POST) {
    $opass = $_POST['ops'];
    $npass = $_POST['nps'];
    $cpass = $_POST['cps'];
    $u_id = $_SESSION['u_id'];

    $p = mysqli_query($con, "select * from register where u_id = '{$u_id}'");
    $r = mysqli_fetch_array($p);
    extract($r);
    if($u_password == $opass)
    {
        if($npass == $cpass)
        {
            if($opass == $npass)
            {
                echo "<script>alert('New Password Must be different from old password');</script>";
            }
            else
            {
                $cq = mysqli_query($con,"update register set u_password = '{$npass}' where u_id = '{$u_id}'");
                echo "<script>alert('Password Change successfully');window.location = 'index.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('New Password & Confirm Password not Match');</script>";
        }
    }
    else
    {
        echo "<script>alert('Old Password Not Match');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <div class="container justify-content-md-center pt-4 ">
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <form action="" method="POST" class="col-lg-4">
            <h1>Change Passsword</h1>
            <br><br>
            <div class="form-group">
                <label for="exampleInputPassword1">Old Password</label>
                <input type="password" class="form-control" name="ops" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="nps" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="cps" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>