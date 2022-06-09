<?php
require 'koneksi.php';
$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($db, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">

  <title>Detail Produk</title>
</head>

<body>
  <?php require 'navbar.php'; ?>

  <!-- DETAIL PRODUK -->

  <div class="container-fluid py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mb-4">
          <img src="img/<?= $produk['gambar']; ?>" class="w-100" alt="">
        </div>
        <div class="col-lg-6 offset-lg-1">
          <h1 class="fs-4"><?= $produk['nama']; ?></h1>
          <p><?= $produk['detail']; ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER  -->
  <?php require 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>