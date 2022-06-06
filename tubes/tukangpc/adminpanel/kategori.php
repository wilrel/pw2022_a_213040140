<?php

require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($db, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>


<style>
  .no-decoration {
    text-decoration: none;

  }
</style>

<body>
  <?php require 'navbar.php' ?>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <a class="no-decoration text-muted" href="index.php"><i class="fa-solid fa-house"></i> Home
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Kategori
        </li>
      </ol>
    </nav>
    <div class="my-5 col-12 col-md-6">
      <h3>Tambah Kategori</h3>
      <form action="" method="post">
        <div>
          <label for="kategori">Kategori</label><input type="text" id="kategori" name="kategori" placeholder="Input Nama Kategori" class="form-control">
        </div>
        <div>
          <button class="btn btn-primary mt-2" type="submit" name="save_kategori">Tambah</button>
        </div>
      </form>
      <?php
      if (isset($_POST['save_kategori'])) {
        $kategori = htmlspecialchars($_POST['kategori']);

        $queryExist = mysqli_query($db, "SELECT nama FROM kategori WHERE nama = '$kategori'");
        $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

        if ($jumlahDataKategoriBaru > 0) {
      ?>
          <div class="alert alert-danger mt-5" role="alert">
            Kategori Sudah Tersedia
          </div>
          <?php
        } else {
          $querySimpan = mysqli_query($db, "INSERT INTO kategori (nama) VALUES ('$kategori')");

          if ($querySimpan) {
          ?>
            <div class="alert alert-success mt-4" role="alert">
              Kategori Sukses Ditambahkan
            </div>

            <!-- Pengganti Ajax -->
            <meta http-equiv="refresh" content="1">
      <?php
          } else {
            echo mysqli_error($db);
          }
        }
      }
      ?>
    </div>
    <div class="mt-5">
      <h2>List Kategori</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No. </th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($jumlahKategori == 0) {
            ?>
              <tr>
                <td colspan="3" class="text-center">Data Tidak Tersedia</td>
              </tr>
              <?php
            } else {
              $jumlah = 1;
              while ($data = mysqli_fetch_array($queryKategori)) {
              ?>
                <tr>
                  <td><?= $jumlah; ?></td>
                  <td><?= $data['nama']; ?></td>
                  <td><a href="kategori-detail.php?r=<?= $data['id']; ?>" class="btn btn-info"> <i class="fa-solid fa-circle-info"></i></a></td>
                </tr>
            <?php
                $jumlah++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>