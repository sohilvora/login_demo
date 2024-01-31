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
        <form action="" method="POST" class="col-lg-4">
            <h1>Forgot Passsword</h1>
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
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
</body>

</html>