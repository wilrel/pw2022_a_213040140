<?php

require 'koneksi.php';
$queryKategori = mysqli_query($db, "SELECT * FROM kategori");
//get produk default
if (isset($_GET['keyword'])) {
  $queryProduk = mysqli_query($db, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
//get produk by kategori
else if (isset($_GET['kategori'])) {
  $queryGetIdKategori = mysqli_query($db, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
  $idKategori = mysqli_fetch_array($queryGetIdKategori);

  $queryProduk = mysqli_query($db, "SELECT * FROM produk WHERE id_kategori='$idKategori[id]'");
}
//get produk by nama produk
else {
  $queryProduk = mysqli_query($db, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);
echo $countData;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
</head>

<body>
  <?php require 'navbar.php' ?>

  <!-- Banner -->

  <div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h1 class="text-white text-center">Produk</h1>
    </div>
  </div>

  <!-- Body -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 mb-5">
        <h3>Kategori</h3>
        <div class="list-group">
          <ul class="list-group">
            <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
              <a class="no-decoration" href="produk.php?kategori=<?= $kategori['nama']; ?>">
                <li class="list-group-item"><?= $kategori['nama']; ?></li>
              </a>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col lg-9">
        <h3 class="text-center mb-3">Produk</h3>
        <div class="row">
          <?php
          if ($countData < 1) {

          ?>
            <h3 class="text-center my-5"> Produk Tidak Tersedia !</h3>
          <?php } ?>
          <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <div class="image-box">
                  <img src="img/<?= $produk['gambar']; ?>?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?= $produk['nama']; ?></h5>
                  <p class="card-text text-truncate"><?= $produk['detail']; ?></p>
                  <a href="produk-detail.php?nama=<?= $produk['nama']; ?>" class="btn btn-primary warna5">Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php  } ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer  -->
  <?php require 'footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>