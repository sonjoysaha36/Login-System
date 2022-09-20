<?php
$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'parcial/_db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    $sql = "Select * from users where username= '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    }
    else{
        $showError = "Invalid Credentials";
    }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require 'parcial/_nav.php'
    ?>
  
<?php
    if($showError){
    echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong>'
    .$showError. 
  '</div>';
    }
    
?>
    <div class="container">
        <h1 class="text-center">Log in to our website</h1>
        <form action="login.php" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
 

  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

<!-- INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES ('1', 'sanju', '1234', current_timestamp()); -->