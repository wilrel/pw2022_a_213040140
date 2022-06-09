<?php
require 'koneksi.php';
$queryProduk = mysqli_query($db, "SELECT id, nama, gambar, detail FROM produk LIMIT 6");
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
  <title>Tukang PC | HOME</title>
</head>

<body>
  <?php require "navbar.php"; ?>

  <!-- banner -->
  <div class="container-fluid banner d-flex align-items-center">
    <div class="container text-white">
      <h1>TUKANGPC KATALOG</h1>
      <h3 class="lead">#mendingrakitpc</h3>
      <h3>Cari apa yang lo mau !</h3>
      <div class="col-md-7 ">
        <form action="produk.php" method="GET">
          <div class="input-group input-group-lg my-3">
            <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="basic-addon2" name="keyword">
            <button type="submit" class="btn warna5">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Kategori Highlight -->
  <div class="container-fluid py-5">
    <div class="container text-center">
      <h3>Tersorot</h3>
      <div class="row mt-6">
        <div class="col-md-4">
          <div class="highlighted-kategori kategori-vga d-flex justify-content-center align-items-center">
            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=VGA">VGA</a> </h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="highlighted-kategori kategori-ram d-flex justify-content-center align-items-center">
            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=RAM">RAM</a> </h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="highlighted-kategori kategori-monitor d-flex justify-content-center align-items-center">
            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Monitor">Monitor</a> </h4>
          </div>
        </div>
      </div>
    </div>
  </div>2


  <!-- Tentang Kami -->

  <div class="container-fluid warna6 py-5">
    <div class="container text-center text-white">
      <h3>Tentang Kami</h3>
      <p class="fs-5 mt-7">Kebahagiaan kamu semua semestinya menjadi kebahagiaan bersama bagi kita mengingat tuhan semesta alam pemilik wewenang segala medan</p>
    </div>
  </div>


  <!-- Produk -->

  <div class="container-fluid py-5">
    <div class="container text-center">
      <h3>Produk</h3>
      <div class="row mt-5">

        <!-- Perulangan pengambilan produk -->
        <?php while ($data = mysqli_fetch_array($queryProduk)) {

        ?>

          <div class="col-md-4">
            <div class="card h-100">
              <div class="image-box">
                <img src="img/<?= $data['gambar']; ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $data['nama']; ?></h5>
                <p class="card-text text-truncate"><?= $data['detail']; ?></p>
                <a href="produk-detail.php?nama=<?= $data['nama']; ?>" class="btn btn-primary warna5">Selengkapnya</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <a class="btn btn-outline-danger mt-5" href="produk.php">
        Tampilkan Lebih Banyak
      </a>
    </div>
  </div>


  <!-- FOOTER -->
  <?php require 'footer.php' ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>