<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($db, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($db, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <title>Admin Page</title>
</head>

<style>
  .kotak {
    border: solid;
  }

  .summary-kategori {
    background-color: #2596be;
    border-radius: 20px;
  }

  .no-decoration {
    text-decoration: none;
  }

  .summary-produk {
    background-color: #37BBA7;
    border-radius: 20px;
  }
</style>


<body>
  <?php require "navbar.php"; ?>
  <div class="container mt-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fa-solid fa-house"></i> Home
        </li>
      </ol>
    </nav>
    <h2>Halo <?= $_SESSION['username']; ?></h2>

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-11 mb-4">
          <div class="summary-kategori p-3">
            <div class="row">
              <div class="col-6">
                <i class="fa-solid fa-align-justify fa-5x text-black-50"></i>
              </div>
              <div class="col-6 text-white">
                <h3 class="fs-3">Kategori</h3>
                <p>Jumlah Kategori : <?php echo $jumlahKategori; ?></p>
                <p><a class="text-white no-decoration" href="kategori.php">Lihat Selengkapnya</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 col-11 mb-4">
          <div class="summary-produk p-3">
            <div class="row">
              <div class="col-6">
                <i class="fa-solid fa-desktop fa-5x text-black-50"></i>
              </div>
              <div class="col-6 text-white">
                <h3 class="fs-3">Produk</h3>
                <p>Jumlah Produk : <?= $jumlahProduk; ?></p>
                <p><a class="text-white no-decoration" href="produk.php">Lihat Selengkapnya</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>