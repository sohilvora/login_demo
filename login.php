<?php
session_start();
require("dbconnect.php");
if ($_POST) {
  $u_email = $_POST['email'];
  $u_password = $_POST['ps'];

  $q = mysqli_query($con, "select * from register where u_email='{$u_email}' and u_password = '{$u_password}' ");
  $count = mysqli_num_rows($q);
  $row = mysqli_fetch_array($q);

  if ($count > 0) {
    $_SESSION['u_id'] = $row['u_id'];
    $_SESSION['u_name'] = $row['u_name'];
    $_SESSION['u_email'] = $row['u_email'];
    header('location:index.php');
  } else {
    echo "<script>alert('Could'nt Login');</script>";
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
  <div class="container justify-content-md-center pt-4  ">
    <form action="" method="POST" class="col-lg-4">
      <h1>Login</h1>
      <br><br>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
        <br>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="ps" id="exampleInputPassword1" placeholder="Password" required>
      </div>
      <br>
      
      <button type="submit" class="btn btn-primary">Login</button>
      <div class="text-end">
      <a href="forgotpass.php" class="text-danger">Forgot Password</a>
      </div></form>
  </div>
</body>

</html>