<?php
    
    if(isset($_GET['error'])) {
        if($_GET['error'] == 1) {
            echo "<h1 class='text-center display-4 text-danger'>Invalid  password</h1>" ;
        }
        if($_GET['error'] == 2) {
            echo "<h1 class='text-center display-4 text-danger'>Invalid email</h1>" ;
        }
        if($_GET['error'] == 3) {
            echo "<h1 class='text-center display-4 text-danger'>Please login to continue</h1>" ;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="s.css">
</head>
<body class="loginForm">
  <div class="container log">
    <h1 class="text-center display-4">Login</h1>
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <button type="submit" class="btn btn-outline-dark">Login</button>
</form>
<form action="regForm.php" method="post">
  <button type="submit" class="btn btn-outline-dark">Signup</button>
</form>
<form action="index.php" method="post">
  <button type="submit" class="btn btn-outline-dark guest">Continue as guest</button>
</form>
</div>
</body>
</html>