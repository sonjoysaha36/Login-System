<?php
$showalert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'parcial/_db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists= false;
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows>0){
        $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        $exists = false;
    if(($password == $cpassword)){
        $sql = "INSERT INTO `users`.`users` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($con, $sql);
        if ($result){
            $showalert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'parcial/_nav.php'
    ?>
    <?php
    if($showalert){
    echo '<div class="alert alert-primary" role="alert">
    Your account is now created now you can login
  </div>';
    }
    
?>
<?php
    if($showError){
    echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong>'
    .$showError. 
  '</div>';
    }
    
?>
    <div class="container">
        <h1 class="text-center">Sign up to our website</h1>
        <form action="signup.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure type the same password.</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

<!-- INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES ('1', 'sanju', '1234', current_timestamp()); -->