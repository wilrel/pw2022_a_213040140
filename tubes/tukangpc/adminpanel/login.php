<?php
session_start();
require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
  .main {
    height: 100vh;
  }

  .login-box {
    width: 600px;
    height: 400px;
    border: solid 5px;
  }
</style>

<body>
  <link rel="stylesheet" href="css/style.css">


  <nav class="navbar navbar-expand-lg bg-light warna4">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-5">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="../produk.php">Produk</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="adminpanel/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main d-flex flex-column justify-content-center align-items-center">
    <form action="" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username">
        <div class="form-text">Silahkan Isi Username Anda</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-primary form-control" name="loginbtn">Login</button>
    </form>

    <div class="mt-3">
      <?php
      if (isset($_POST['loginbtn'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $query = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        $countdata = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

        if ($countdata > 0) {
          if (password_verify($password, $data['password'])) {
            $_SESSION['username'] =  $data['username'];
            $_SESSION['login'] = true;
            header('Location: ../adminpanel');
          } else {
      ?>
            <div class="alert alert-danger" role="alert">
              Password Salah !!
            </div>
          <?php
          }
        } else {
          ?>
          <div class="alert alert-danger" role="alert">
            Username Tidak Ada !!
          </div>
      <?php
        }
      }
      ?>
    </div>



  </div>


</body>

</html>